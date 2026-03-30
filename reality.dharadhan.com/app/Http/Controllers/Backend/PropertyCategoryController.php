<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\PropertyCategory\StorePropertyCategoryRequest;
use App\Http\Requests\PropertyCategory\UpdatePropertyCategoryRequest;
use App\Models\PropertyCategory;
use App\Models\User;
use App\Services\PropertyCategoryService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyCategoryController extends Controller
{
    public function __construct(
        private readonly PropertyCategoryService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['property.category.view']);

        $filters = [
            'search' => request('search'),
            'status' => request('status'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.property-categories.index', [
            'propertyCategories' => $this->service->getPropertyCategories($filters),
            'statuses' => statuses(),
            'filters' => $filters,
            'breadcrumbs' => [
                'title' => __('Property Categories'),
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $this->checkAuthorization(Auth::user(), ['property.category.create']);

        return view('backend.pages.property-categories.create', [
            'statuses' => statuses(),
            'breadcrumbs' => [
                'title' => __('Create Property Category'),
                'items' => [
                    [
                        'label' => __('Property Categories'),
                        'url' => route('admin.property.categories.index'),
                    ],
                ],
            ],
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePropertyCategoryRequest $request)
    {
        $this->checkAuthorization(Auth::user(), ['property.category.create']);
        try {
            $this->service->createPropertyCategory($request->validated());
            $this->storeActionLog(ActionType::CREATED, ['property_category' => $request->validated()]);
            return redirect()->route('admin.property.categories.index')->with('success', __('Property category created successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to create property category.'));
        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['property.category.edit']);

        $propertyCategory = $this->service->getPropertyCategoryById((int) $id);
        return view('backend.pages.property-categories.edit', [
            'propertyCategory' => $propertyCategory,
            'statuses' => statuses(),
            'breadcrumbs' => [
                'title' => __('Edit Property Category'),
                'items' => [
                    [
                        'label' => __('Property Categories'),
                        'url' => route('admin.property.categories.index'),
                    ],
                ],
            ],
        ]);
    }

    public function update(UpdatePropertyCategoryRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['property.category.edit']);

        try {
            $propertyCategory = $this->service->getPropertyCategoryById((int) $id);
            $this->service->updatePropertyCategory($propertyCategory, $request->validated());
            $this->storeActionLog(ActionType::UPDATED, ['property_category' => $propertyCategory]);
            return redirect()->route('admin.property.categories.index')->with('success', __('Property category updated successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to update property category.'));
        }
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['property.category.delete']);

        try {
            $propertyCategory = $this->service->getPropertyCategoryById((int) $id);
            $this->service->deletePropertyCategory($propertyCategory);
            $this->storeActionLog(ActionType::DELETED, ['property_category' => $propertyCategory]);
            return redirect()->route('admin.property.categories.index')->with('success', __('Property category deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete property category.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['property.category.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.property.categories.index')
                ->with('error', __('No property categories selected for deletion'));
        }

        $propertyCategories = $this->service->getPropertyCategoriesByIds($ids);
        $deletedCount = 0;

        foreach ($propertyCategories as $propertyCategory) {
            $propertyCategory = ld_apply_filters('property_category_delete_before', $propertyCategory);
            $propertyCategory->delete();
            ld_apply_filters('property_category_delete_after', $propertyCategory);

            $this->storeActionLog(ActionType::DELETED, ['property_category' => $propertyCategory]);
            ld_do_action('property_category_delete_after', $propertyCategory);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count property categories deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No property categories were deleted. Selected property categories may include protected accounts.'));
        }

        return redirect()->route('admin.property.categories.index');
    }
}
