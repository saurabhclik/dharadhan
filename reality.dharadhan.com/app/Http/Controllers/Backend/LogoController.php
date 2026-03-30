<?php
// app/Http/Controllers/Backend/LogoController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Logo;
use App\Models\Property;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class LogoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of logos
     */
    public function index()
    {
        if (!Auth::user()->can('logo.view')) {
            return redirect()->route('admin.dashboard')
                ->with('error', 'You do not have permission to view logos.');
        }

        $breadcrumbs = [
            'title' => 'Logo Management',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Logos', 'url' => route('admin.logos.index')],
            ]
        ];

        $logos = Logo::ordered()->paginate(10);
        return view('backend.logos.index', compact('logos', 'breadcrumbs'));
    }

    /**
     * Show form for creating new logo
     */
    public function create()
    {
        if (!Auth::user()->can('logo.create')) {
            return redirect()->route('admin.logos.index')
                ->with('error', 'You do not have permission to create logos.');
        }

        $breadcrumbs = [
            'title' => 'Add New Logo',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Logos', 'url' => route('admin.logos.index')],
                ['label' => 'Add New', 'url' => '#'],
            ]
        ];

        $properties = Property::active()->pluck('title', 'id');
        return view('backend.logos.create', compact('breadcrumbs', 'properties'));
    }

    /**
     * Store newly created logo
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('logo.create')) {
            return redirect()->route('admin.logos.index')
                ->with('error', 'You do not have permission to create logos.');
        }

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_type' => 'required|in:property,url,none',
            'property_id' => 'required_if:link_type,property|nullable|exists:properties,id',
            'external_url' => 'required_if:link_type,url|nullable|url',
            'badge_text' => 'nullable|string|max:50',
            'badge_color' => 'nullable|string|max:20',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        try {
            // Upload image
            $path = $request->file('image')->store('logos', 'public');

            Logo::create([
                'title' => $request->title,
                'image_path' => $path,
                'link_type' => $request->link_type,
                'property_id' => $request->property_id,
                'external_url' => $request->external_url,
                'badge_text' => $request->badge_text ?? 'For Sale',
                'badge_color' => $request->badge_color ?? '#dc3545',
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->has('is_active')
            ]);

            return redirect()->route('admin.logos.index')
                ->with('success', 'Logo created successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to create logo: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Show form for editing logo
     */
    public function edit(Logo $logo)
    {
        if (!Auth::user()->can('logo.edit')) {
            return redirect()->route('admin.logos.index')
                ->with('error', 'You do not have permission to edit logos.');
        }

        $breadcrumbs = [
            'title' => 'Edit Logo',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Logos', 'url' => route('admin.logos.index')],
                ['label' => 'Edit', 'url' => '#'],
            ]
        ];

        $properties = Property::active()->pluck('title', 'id');
        return view('backend.logos.edit', compact('logo', 'breadcrumbs', 'properties'));
    }

    /**
     * Update logo
     */
    public function update(Request $request, Logo $logo)
    {
        if (!Auth::user()->can('logo.edit')) {
            return redirect()->route('admin.logos.index')
                ->with('error', 'You do not have permission to edit logos.');
        }

        $request->validate([
            'title' => 'nullable|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'link_type' => 'required|in:property,url,none',
            'property_id' => 'required_if:link_type,property|nullable|exists:properties,id',
            'external_url' => 'required_if:link_type,url|nullable|url',
            'badge_text' => 'nullable|string|max:50',
            'badge_color' => 'nullable|string|max:20',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        try {
            $data = [
                'title' => $request->title,
                'link_type' => $request->link_type,
                'property_id' => $request->property_id,
                'external_url' => $request->external_url,
                'badge_text' => $request->badge_text ?? 'For Sale',
                'badge_color' => $request->badge_color ?? '#dc3545',
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->has('is_active')
            ];

            // Upload new image if provided
            if ($request->hasFile('image')) {
                // Delete old image
                Storage::disk('public')->delete($logo->image_path);
                
                // Upload new image
                $path = $request->file('image')->store('logos', 'public');
                $data['image_path'] = $path;
            }

            $logo->update($data);

            return redirect()->route('admin.logos.index')
                ->with('success', 'Logo updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update logo: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete logo
     */
    public function destroy(Logo $logo)
    {
        if (!Auth::user()->can('logo.delete')) {
            return redirect()->route('admin.logos.index')
                ->with('error', 'You do not have permission to delete logos.');
        }
        
        try {
            // Delete image file
            Storage::disk('public')->delete($logo->image_path);
            
            $logo->delete();
            return redirect()->route('admin.logos.index')
                ->with('success', 'Logo deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete logo: ' . $e->getMessage());
        }
    }

    /**
     * Bulk delete logos
     */
    public function bulkDelete(Request $request)
    {
        if (!Auth::user()->can('logo.delete')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }
        
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:logos,id'
        ]);

        try {
            // Delete image files
            $logos = Logo::whereIn('id', $request->ids)->get();
            foreach ($logos as $logo) {
                Storage::disk('public')->delete($logo->image_path);
            }
            
            Logo::whereIn('id', $request->ids)->delete();
            return response()->json(['success' => true, 'message' => 'Logos deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete logos: ' . $e->getMessage()], 500);
        }
    }
}