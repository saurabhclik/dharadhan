<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Property;

class PropertyEngagementService
{
    /**
     * Get property reactions with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getEngagements(array $filters = [])
    {
        $query = Property::select('properties.id', 'properties.title')
                ->has('reactions')
                ->withCount([
                    'likes',
                    'dislikes',
                    'favourites',
                ])
                ->applyFilters($filters);

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Get review by ID.
     *
     * @param int $id
     * @return PropertyReaction|null
     */
    public function getEngagementById(int $id): ?PropertyReaction
    {
        return PropertyReaction::find($id);
    }

}

