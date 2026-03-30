<?php
// app/Http/Controllers/Backend/VideoController.php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VideoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of videos
     */
    public function index()
    {
        if (!Auth::user()->can('video.view')) 
        {
            return redirect()->route('admin.dashboard')
                ->with('error', 'You do not have permission to view videos.');
        }

        $breadcrumbs = [
            'title' => 'Video Management',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Videos', 'url' => route('admin.videos.index')],
            ]
        ];

        $videos = Video::ordered()->paginate(10);
        return view('backend.videos.index', compact('videos', 'breadcrumbs'));
    }

    public function create()
    {
        if (!Auth::user()->can('video.create')) 
        {
            return redirect()->route('admin.videos.index')
                ->with('error', 'You do not have permission to create videos.');
        }

        $breadcrumbs = [
            'title' => 'Add New Video',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Videos', 'url' => route('admin.videos.index')],
                ['label' => 'Add New', 'url' => '#'],
            ]
        ];

        return view('backend.videos.create', compact('breadcrumbs'));
    }

    public function edit(Video $video)
    {
        if (!Auth::user()->can('video.edit')) 
        {
            return redirect()->route('admin.videos.index')
                ->with('error', 'You do not have permission to edit videos.');
        }

        $breadcrumbs = [
            'title' => 'Edit Video',
            'items' => [
                ['label' => 'Dashboard', 'url' => route('admin.dashboard')],
                ['label' => 'Videos', 'url' => route('admin.videos.index')],
                ['label' => 'Edit', 'url' => '#'],
            ]
        ];

        return view('backend.videos.edit', compact('video', 'breadcrumbs'));
    }

    /**
     * Store newly created video
     */
    public function store(Request $request)
    {
        if (!Auth::user()->can('video.create')) 
        {
            return redirect()->route('admin.videos.index')
                ->with('error', 'You do not have permission to create videos.');
        }

        $request->validate([
            'title' => 'nullable|string|max:255',
            'youtube_url' => 'required|url',
            'position' => 'required|in:left,center,right',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        try 
        {
            $youtubeId = Video::extractYoutubeId($request->youtube_url);
            
            if (!$youtubeId) 
            {
                return back()->withErrors(['youtube_url' => 'Invalid YouTube URL'])->withInput();
            }

            Video::create([
                'title' => $request->title,
                'youtube_url' => $request->youtube_url,
                'youtube_id' => $youtubeId,
                'position' => $request->position,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->has('is_active')
            ]);

            return redirect()->route('admin.videos.index')
                ->with('success', 'Video created successfully.');
        } 
        catch (\Exception $e) 
        {
            return back()->with('error', 'Failed to create video: ' . $e->getMessage())->withInput();
        }
    }


    /**
     * Update video
     */
    public function update(Request $request, Video $video)
    {
        if (!Auth::user()->can('video.edit')) {
            return redirect()->route('admin.videos.index')
                ->with('error', 'You do not have permission to edit videos.');
        }

        $request->validate([
            'title' => 'nullable|string|max:255',
            'youtube_url' => 'required|url',
            'position' => 'required|in:left,center,right',
            'sort_order' => 'nullable|integer',
            'is_active' => 'boolean'
        ]);

        try {
            $youtubeId = Video::extractYoutubeId($request->youtube_url);
            
            if (!$youtubeId) {
                return back()->withErrors(['youtube_url' => 'Invalid YouTube URL'])->withInput();
            }

            $video->update([
                'title' => $request->title,
                'youtube_url' => $request->youtube_url,
                'youtube_id' => $youtubeId,
                'position' => $request->position,
                'sort_order' => $request->sort_order ?? 0,
                'is_active' => $request->has('is_active')
            ]);

            return redirect()->route('admin.videos.index')
                ->with('success', 'Video updated successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to update video: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Delete video
     */
    public function destroy(Video $video)
    {
        if (!Auth::user()->can('video.delete')) {
            return redirect()->route('admin.videos.index')
                ->with('error', 'You do not have permission to delete videos.');
        }
        
        try {
            $video->delete();
            return redirect()->route('admin.videos.index')
                ->with('success', 'Video deleted successfully.');
        } catch (\Exception $e) {
            return back()->with('error', 'Failed to delete video: ' . $e->getMessage());
        }
    }

    /**
     * Bulk delete videos
     */
    public function bulkDelete(Request $request)
    {
        if (!Auth::user()->can('video.delete')) {
            return response()->json(['success' => false, 'message' => 'Unauthorized'], 403);
        }
        
        $request->validate([
            'ids' => 'required|array',
            'ids.*' => 'exists:videos,id'
        ]);

        try {
            Video::whereIn('id', $request->ids)->delete();
            return response()->json(['success' => true, 'message' => 'Videos deleted successfully.']);
        } catch (\Exception $e) {
            return response()->json(['success' => false, 'message' => 'Failed to delete videos: ' . $e->getMessage()], 500);
        }
    }
}