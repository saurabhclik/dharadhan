<?php
// app/Http/Controllers/Backend/LocalityController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Locality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class LocalityController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of localities
     */
    public function index()
    {
        if (!Auth::user()->can('locality.view')) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'You do not have permission to view localities.');
        }

        $breadcrumbs = [
            'title' => 'Locality Management',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Localities', 'url' => route('admin.localities.index')],
            ]
        ];

        $localities = Locality::orderBy('category')
            ->orderBy('sort_order')
            ->paginate(20);
            
        return view('backend.localities.index', compact('localities', 'breadcrumbs'));
    }

    /**
     * Show form for creating new locality
     */
    public function create()
    {
        if (!Auth::user()->can('locality.create')) {
            return redirect()->route('admin.localities.index')
                ->with('error', 'You do not have permission to create localities.');
        }

        $breadcrumbs = [
            'title' => 'Add New Locality',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Localities', 'url' => route('admin.localities.index')],
                ['label' => 'Add New', 'url' => '#'],
            ]
        ];

        $categories = [
            'nearby' => 'Nearby Cities',
            'popular' => 'Popular Cities',
            'other' => 'Other Cities'
        ];

        return view('backend.localities.create', compact('breadcrumbs', 'categories'));
    }

    /**
     * Store newly created locality
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('locality.create')) {
            return redirect()->route('admin.localities.index')
                ->with('error', 'You do not have permission to create localities.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:localities',
            'category' => 'required|in:nearby,popular,other',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        try {
            Locality::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category' => $request->category,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->has('is_active')
            ]);

            // Clear cache
            cache()->forget('cities_grouped');

            return redirect()->route('admin.localities.index')
                ->with('success', 'Locality created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create locality: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show form for editing locality
     */
    public function edit(Locality $locality)
    {
        if (!Auth::user()->can('locality.edit')) {
            return redirect()->route('admin.localities.index')
                ->with('error', 'You do not have permission to edit localities.');
        }

        $breadcrumbs = [
            'title' => 'Edit Locality',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Localities', 'url' => route('admin.localities.index')],
                ['label' => 'Edit', 'url' => '#'],
            ]
        ];

        $categories = [
            'nearby' => 'Nearby Cities',
            'popular' => 'Popular Cities',
            'other' => 'Other Cities'
        ];

        return view('backend.localities.edit', compact('locality', 'breadcrumbs', 'categories'));
    }

    /**
     * Update locality
     */
    public function update(Request $request, Locality $locality)
    {
        if (!Auth::user()->can('locality.edit')) {
            return redirect()->route('admin.localities.index')
                ->with('error', 'You do not have permission to edit localities.');
        }

        $request->validate([
            'name' => 'required|string|max:255|unique:localities,name,' . $locality->id,
            'category' => 'required|in:nearby,popular,other',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        try {
            $locality->update([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'category' => $request->category,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->has('is_active')
            ]);

            // Clear cache
            cache()->forget('cities_grouped');

            return redirect()->route('admin.localities.index')
                ->with('success', 'Locality updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update locality: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete locality
     */
    public function destroy(Locality $locality)
    {
        if (!Auth::user()->can('locality.delete')) {
            return redirect()->route('admin.localities.index')
                ->with('error', 'You do not have permission to delete localities.');
        }
        
        try {
            $locality->delete();
            
            // Clear cache
            cache()->forget('cities_grouped');
            
            return redirect()->route('admin.localities.index')
                ->with('success', 'Locality deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete locality: ' . $e->getMessage());
        }
    }

    /**
     * Bulk delete localities
     */
    public function bulkDelete(Request $request)
    {
        if (!Auth::user()->can('locality.delete')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }
        
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:localities,id'
        ]);

        try {
            Locality::whereIn('id', $request->ids)->delete();
            
            // Clear cache
            cache()->forget('cities_grouped');
            
            return response()->json(['success' => true, 'message' => 'Localities deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete localities: ' . $e->getMessage()], 500);
        }
    }
}