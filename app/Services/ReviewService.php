<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Review;

class ReviewService
{
    /**
     * Get reviews with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getReviews(array $filters = [])
    {
        $query = Review::has('property')->applyFilters($filters);

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Create a new review.
     *
     * @param array $data
     * @return Review
     */
    public function createReview(array $data): Review
    {
        $review = new Review();
        $review->fill($data);
        $review->save();

        return $review;
    }

    /**
     * Update an existing review.
     *
     * @param Review $review
     * @param array $data
     * @return Review
     */
    public function updateReview(Review $review, array $data): Review
    {
        $review->fill($data);
        $review->save();

        return $review;
    }

    /**
     * Delete a review.
     *
     * @param Review $review
     * @return void
     */
    public function deleteReview(Review $review): void
    {
        $review->delete();
    }

    /**
     * Get review by ID.
     *
     * @param int $id
     * @return Review|null
     */
    public function getReviewById(int $id): ?Review
    {
        return Review::find($id);
    }

    /**
     * Get reviews by review ids.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getReviewsByIds(array $reviewIds)
    {
        return Review::whereIn('id', $reviewIds)->get();
    }
}

