<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\PropertyCategory;

class PropertyCategoryService
{
    /**
     * Get property categories with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getPropertyCategories(array $filters = [])
    {
        $query = PropertyCategory::applyFilters($filters);

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Create a new property category.
     *
     * @param array $data
     * @return PropertyCategory
     */
    public function createPropertyCategory(array $data): PropertyCategory
    {
        $propertyCategory = new PropertyCategory();
        $propertyCategory->fill($data);
        $propertyCategory->save();

        return $propertyCategory;
    }

    /**
     * Update an existing property category.
     *
     * @param PropertyCategory $propertyCategory
     * @param array $data
     * @return PropertyCategory
     */
    public function updatePropertyCategory(PropertyCategory $propertyCategory, array $data): PropertyCategory
    {
        $propertyCategory->fill($data);
        $propertyCategory->save();

        return $propertyCategory;
    }

    /**
     * Delete a property category.
     *
     * @param PropertyCategory $propertyCategory
     * @return void
     */
    public function deletePropertyCategory(PropertyCategory $propertyCategory): void
    {
        $propertyCategory->delete();
    }

    /**
     * Get property category by ID.
     *
     * @param int $id
     * @return PropertyCategory|null
     */
    public function getPropertyCategoryById(int $id): ?PropertyCategory
    {
        return PropertyCategory::find($id);
    }

    /**
     * Get property categories by property category ids.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPropertyCategoriesByIds(array $propertyCategoryIds)
    {
        return PropertyCategory::whereIn('id', $propertyCategoryIds)->get();
    }
}
