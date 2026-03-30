<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Property;
use App\Models\Locality;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PropertyService
{
    /**
     * Get properties with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getProperties(array $filters = [])
    {
        $query = Property::with('locality', 'agent');

        if (!empty($filters['city'])) {
            $query->whereHas('locality', function ($q) use ($filters) {
                $q->where('name', 'like', '%' . $filters['city'] . '%')
                ->orWhere('slug', 'like', '%' . $filters['city'] . '%');
            });
        }

        if (!empty($filters['location'])) {
            $query->where('location', 'like', '%' . $filters['location'] . '%');
        }

        if (!empty($filters['property_type'])) {
            $query->where('property_type', $filters['property_type']);
        }

        if (!empty($filters['status'])) {
            $query->where('status', $filters['status']);
        }

        if (!empty($filters['search'])) {
            $query->where(function ($q) use ($filters) {
                $q->where('title', 'like', '%' . $filters['search'] . '%')
                ->orWhere('location', 'like', '%' . $filters['search'] . '%')
                ->orWhereHas('locality', function ($sub) use ($filters) {
                    $sub->where('name', 'like', '%' . $filters['search'] . '%')
                        ->orWhere('slug', 'like', '%' . $filters['search'] . '%');
                });
            });
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
    public function createProperty(array $data)
    {
        try {
            DB::beginTransaction();

            // Handle locality
            if (isset($data['locality']) && !empty($data['locality'])) {
                $locality = $this->findOrCreateLocality($data['locality']);
                $data['locality_id'] = $locality->id;
            }
            
            // Remove locality field as it's not a column in properties table
            unset($data['locality']);

            $property = Property::create($data);
            
            DB::commit();
            return $property;
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to create property: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Update an existing property.
     *
     * @param Property $property
     * @param array $data
     * @return Property
     */
    public function updateProperty(Property $property, array $data)
    {
        // dd($data);
        try 
        {
            DB::beginTransaction();

            // Handle locality
            if (isset($data['locality']) && !empty($data['locality'])) 
            {
                $locality = $this->findOrCreateLocality($data['locality']);
                $data['locality_id'] = $locality->id;
            } 
            elseif (array_key_exists('locality', $data) && empty($data['locality']))
            {
                $data['locality_id'] = null;
            }
            // dd($data['locality']);
            unset($data['locality']);

            $property->update($data);
            
            DB::commit();
            return $property;
        } 
        catch (\Exception $e) 
        {
            DB::rollBack();
            Log::error('Failed to update property: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Find or create a locality by name
     *
     * @param string $localityName
     * @return Locality
     */
    private function findOrCreateLocality(string $localityName): Locality
    {
        // Try to find existing locality by name
        $locality = Locality::where('name', $localityName)->first();
        
        if (!$locality) {
            // Create new locality if it doesn't exist
            $slug = generate_unique_slug($localityName, 'slug', '-', new Locality());
            
            $locality = Locality::create([
                'name' => $localityName,
                'slug' => $slug,
                'category' => 'other', // Default category
                'sort_order' => 0,
                'is_active' => true,
            ]);
        }
        
        return $locality;
    }

    /**
     * Delete a property.
     *
     * @param Property $property
     * @return void
     */
    public function deleteProperty(Property $property): void
    {
        try {
            DB::beginTransaction();
            
            // Delete related images if any
            foreach ($property->images as $image) {
                \Storage::disk('public')->delete($image->path);
                $image->delete();
            }
            
            $property->delete();
            
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Failed to delete property: ' . $e->getMessage());
            throw $e;
        }
    }

    /**
     * Get property by ID.
     *
     * @param int $id
     * @return Property|null
     */
    public function getPropertyById(int $id)
    {
        return Property::with(['locality', 'images', 'agent'])->findOrFail($id);
    }

    /**
     * Get properties by property ids.
     *
     * @param array $propertyIds
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getPropertiesByIds(array $propertyIds)
    {
        return Property::whereIn('id', $propertyIds)->with('locality', 'agent')->get();
    }

    /**
     * Get all localities for dropdown
     *
     * @return array
     */
    public function getLocalitiesForDropdown(): array
    {
        $localities = Locality::active()->ordered()->get();
        
        return [
            'nearby' => $localities->where('category', 'nearby')->pluck('name', 'id')->toArray(),
            'popular' => $localities->where('category', 'popular')->pluck('name', 'id')->toArray(),
            'other' => $localities->where('category', 'other')->pluck('name', 'id')->toArray(),
        ];
    }
}