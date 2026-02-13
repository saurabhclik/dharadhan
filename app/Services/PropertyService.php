<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Property;

class PropertyService
{
    /**
     * Get properties with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getProperties(array $filters = [])
    {
        $query = Property::applyFilters($filters);

        if (isset($filters['property_type']) && $filters['property_type']) {
            $query->where('property_type', $filters['property_type']);
        }

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Create a new property.
     *
     * @param array $data
     * @return Property
     */
    public function createProperty(array $data): Property
    {
        $property = new Property();
        $property->fill($data);
        $property->save();

        return $property;
    }

    /**
     * Update an existing property.
     *
     * @param Property $property
     * @param array $data
     * @return Property
     */
    public function updateProperty(Property $property, array $data): Property
    {
        $property->fill($data);
        $property->save();

        return $property;
    }

    /**
     * Delete a property.
     *
     * @param Property $property
     * @return void
     */
    public function deleteProperty(Property $property): void
    {
        $property->delete();
    }

    /**
     * Get property by ID.
     *
     * @param int $id
     * @return Property|null
     */
    public function getPropertyById(int $id): ?Property
    {
        return Property::find($id);
    }

    /**
     * Get properties by property ids.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPropertiesByIds(array $propertyIds)
    {
        return Property::whereIn('id', $propertyIds)->get();
    }
}
