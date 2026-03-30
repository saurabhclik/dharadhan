<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Property\StorePropertyRequest;
use App\Http\Requests\Property\UpdatePropertyRequest;
use App\Models\Property;
use App\Models\PropertyCategory;
use App\Models\User;
use App\Services\PropertyService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Laravel\Facades\Image;

class PropertyController extends Controller
{
    public function __construct(
        private readonly PropertyService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $this->checkAuthorization(Auth::user(), ['property.view']);
        $filters = [
            'search' => $request->search,
            'property_type' => $request->property_type,
            'status' => $request->status,
            'property_id' => $request->property_id,
            'location' => $request->location,
            'city' => $request->city,
            'per_page' => $request->per_page ?? config('settings.default_pagination'),
            'sort_field' => $request->sort_field,
            'sort_direction' => $request->sort_direction,
        ];
        $properties = $this->service->getProperties($filters);
        return view('backend.pages.properties.index', [
            'properties' => $properties,
            'statuses' => statuses(),
            'filters' => $filters,
            'types' => Property::types(),
            'categories' => PropertyCategory::pluck('name', 'id')->toArray(),
            'breadcrumbs' => [
                'title' => __('Properties'),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuthorization(Auth::user(), ['property.create']);

        return view('backend.pages.properties.create', [
            'categories' => PropertyCategory::pluck('name', 'id')->toArray(),
            'users' => User::role('agent')->pluck('name', 'id')->toArray(),
            'statuses' => statuses(),
            'types' => Property::types(),
            'breadcrumbs' => [
                'title' => __('Create Property'),
                'items' => [
                    [
                        'label' => __('Properties'),
                        'url' => route('admin.properties.index'),
                    ],
                ],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyRequest $request)
    {
        $this->checkAuthorization(Auth::user(), ['property.create']);

        try {
            $property = $this->service->createProperty($request->validated());

            if ($request->hasFile('featured_image')) {
                $upload = $request->file('featured_image');
                $image = Image::read($upload);

                $featuredPath = 'properties/featured/' . uniqid() . '.jpg';
                Storage::disk('public')->put($featuredPath, $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 70));

                $property->featured_image = $featuredPath;
                $property->save();
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Store image in public storage
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save record in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'property'
                    ]);
                }
            }

            if ($request->hasFile('plan_images')) {
                foreach ($request->file('plan_images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Store image in public storage
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save record in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'site_plan'
                    ]);
                }
            }

            $this->storeActionLog(ActionType::CREATED, ['property' => $request->validated()]);
            return redirect()->route('admin.properties.index')->with('success', __('Property created successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to create property.'));
        }
    }

    //show a property
    public function show(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['property.view']);

        $property = $this->service->getPropertyById((int) $id);
        return view('backend.pages.properties.show', [
            'property' => $property,
            'breadcrumbs' => [
                'title' => __('View Property'),
                'items' => [
                    [
                        'label' => __('Properties'),
                        'url' => route('admin.properties.index'),
                    ],
                ],
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['property.edit']);

        $property = $this->service->getPropertyById((int) $id);
        return view('backend.pages.properties.edit', [
            'property' => $property,
            'types' => Property::types(),
            'users' => User::pluck('name', 'id')->toArray(),
            'statuses' => statuses(),
            'categories' => PropertyCategory::pluck('name', 'id')->toArray(),
            'breadcrumbs' => [
                'title' => __('Edit Property'),
                'items' => [
                    [
                        'label' => __('Properties'),
                        'url' => route('admin.properties.index'),
                    ],
                ],
            ],
        ]);
    }

    public function update(UpdatePropertyRequest $request, int $id): RedirectResponse
    {
        // dd($request);
        $this->checkAuthorization(Auth::user(), ['property.edit']);

        try {
            $property = $this->service->getPropertyById((int) $id);
            $this->service->updateProperty($property, $request->validated());

            if ($request->hasFile('featured_image')) {
                // Delete old featured image from storage
                if ($request->remove_featured_image && $property->featured_image) {
                    Storage::disk('public')->delete($property->featured_image);
                }

                $upload = $request->file('featured_image');
                $image = Image::read($upload);

                $featuredPath = 'properties/featured/' . uniqid() . '.jpg';
                Storage::disk('public')->put($featuredPath, $image->encodeByExtension($upload->getClientOriginalExtension(), quality: 70));

                $property->featured_image = $featuredPath;
                $property->save();
            }

            if ($request->hasFile('images')) {
                $property_image = $property->images()->where('type','property')->get();
                if($request->remove_images && $property_image) {
                    // Delete old images from storage and DB
                    foreach ($property_image as $oldImage) {
                        Storage::disk('public')->delete($oldImage->path);
                        $oldImage->delete();
                    }
                }

                foreach ($request->file('images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Generate a unique file path
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'property'
                    ]);
                }
            }
            if ($request->hasFile('plan_images')) {
                $property_plan_image = $property->images()->where('type','site_plan')->get();
                if($request->remove_plan_images && $property_plan_image) {
                    // Delete old images from storage and DB
                    foreach ($property_plan_image as $oldImage) {
                        Storage::disk('public')->delete($oldImage->path);
                        $oldImage->delete();
                    }
                }

                foreach ($request->file('plan_images') as $file) {
                    // Optimize image
                    $image = Image::read($file);

                    // Generate a unique file path
                    $path = 'properties/' . uniqid() . '.jpg';
                    Storage::disk('public')->put($path, $image->encodeByExtension($file->getClientOriginalExtension(), quality: 70));

                    // Save in DB
                    $property->images()->create([
                        'path' => $path,
                        'type' => 'site_plan'
                    ]);
                }
            }
            $this->storeActionLog(ActionType::UPDATED, ['property' => $property]);
            return redirect()->route('admin.properties.index')->with('success', __('Property updated successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to update property.'));
        }
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['property.delete']);

        try {
            $property = $this->service->getPropertyById((int) $id);
            $this->service->deleteProperty($property);
            $this->storeActionLog(ActionType::DELETED, ['property' => $property]);
            return redirect()->route('admin.properties.index')->with('success', __('Property deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete property.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['property.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.properties.index')
                ->with('error', __('No properties selected for deletion'));
        }

        $properties = $this->service->getPropertiesByIds($ids);
        $deletedCount = 0;

        foreach ($properties as $property) {
            $property = ld_apply_filters('property_delete_before', $property);
            $property->delete();
            ld_apply_filters('property_delete_after', $property);

            $this->storeActionLog(ActionType::DELETED, ['property' => $property]);
            ld_do_action('property_delete_after', $property);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count properties deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No properties were deleted. Selected properties may include protected accounts.'));
        }

        return redirect()->route('admin.properties.index');
    }
}
