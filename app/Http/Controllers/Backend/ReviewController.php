<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Review\UpdateReviewRequest;
use App\Models\Review;
use App\Models\User;
use App\Services\ReviewService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
    public function __construct(
        private readonly ReviewService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['review.view']);

        $filters = [
            'search' => request('search'),
            'status' => request('status'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.reviews.index', [
            'reviews' => $this->service->getReviews($filters),
            'statuses' => moderateStatuses(),
            'filters' => $filters,
            'breadcrumbs' => [
                'title' => __('Reviews'),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['review.edit']);

        $review = $this->service->getReviewById((int) $id);
        return view('backend.pages.reviews.edit', [
            'review' => $review,
            'statuses' => moderateStatuses(),
            'breadcrumbs' => [
                'title' => __('Edit Review'),
                'items' => [
                    [
                        'label' => __('Reviews'),
                        'url' => route('admin.reviews.index'),
                    ],
                ],
            ],
        ]);
    }

    public function update(UpdateReviewRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['review.edit']);

        try {
            $review = $this->service->getReviewById((int) $id);
            $this->service->updateReview($review, $request->validated());
            $this->storeActionLog(ActionType::UPDATED, ['review' => $review]);
            return redirect()->route('admin.reviews.index')->with('success', __('Review updated successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to update review.'));
        }
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['review.delete']);

        try {
            $review = $this->service->getReviewById((int) $id);
            $this->service->deleteReview($review);
            $this->storeActionLog(ActionType::DELETED, ['review' => $review]);
            return redirect()->route('admin.reviews.index')->with('success', __('Review deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete review.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['review.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.reviews.index')
                ->with('error', __('No reviews selected for deletion'));
        }

        $reviews = $this->service->getReviewsByIds($ids);
        $deletedCount = 0;

        foreach ($reviews as $review) {
            $review = ld_apply_filters('review_delete_before', $review);
            $review->delete();
            ld_apply_filters('review_delete_after', $review);

            $this->storeActionLog(ActionType::DELETED, ['review' => $review]);
            ld_do_action('review_delete_after', $review);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count reviews deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No reviews were deleted. Selected reviews may include protected accounts.'));
        }

        return redirect()->route('admin.reviews.index');
    }
}
