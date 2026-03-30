<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Rating;

class RatingService
{
    /**
     * Get ratings with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getRatings(array $filters = [])
    {
        $query = Rating::applyFilters($filters);

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Create a new rating.
     *
     * @param array $data
     * @return Rating
     */
    public function createRating(array $data): Rating
    {
        $rating = new Rating();
        $rating->fill($data);
        $rating->save();

        return $rating;
    }

    /**
     * Update an existing rating.
     *
     * @param Rating $rating
     * @param array $data
     * @return Rating
     */
    public function updateRating(Rating $rating, array $data): Rating
    {
        $rating->fill($data);
        $rating->save();

        return $rating;
    }

    /**
     * Delete a rating.
     *
     * @param Rating $rating
     * @return void
     */
    public function deleteRating(Rating $rating): void
    {
        $rating->delete();
    }

    /**
     * Get rating by ID.
     *
     * @param int $id
     * @return Rating|null
     */
    public function getRatingById(int $id): ?Rating
    {
        return Rating::find($id);
    }

    /**
     * Get ratings by rating ids.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getRatingsByIds(array $ratingIds)
    {
        return Rating::whereIn('id', $ratingIds)->get();
    }
}

