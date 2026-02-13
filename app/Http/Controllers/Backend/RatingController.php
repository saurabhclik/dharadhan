<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rating\UpdateRatingRequest;
use App\Models\Rating;
use App\Models\User;
use App\Services\RatingService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RatingController extends Controller
{
    public function __construct(
        private readonly RatingService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['rating.view']);

        $filters = [
            'search' => request('search'),
            'status' => request('status'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.ratings.index', [
            'ratings' => $this->service->getRatings($filters),
            'statuses' => statuses(),
            'filters' => $filters,
            'breadcrumbs' => [
                'title' => __('Ratings'),
            ],
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['rating.edit']);

        $rating = $this->service->getRatingById((int) $id);
        return view('backend.pages.ratings.edit', [
            'rating' => $rating,
            'statuses' => statuses(),
            'breadcrumbs' => [
                'title' => __('Edit Rating'),
                'items' => [
                    [
                        'label' => __('Ratings'),
                        'url' => route('admin.ratings.index'),
                    ],
                ],
            ],
        ]);
    }

    public function update(UpdateRatingRequest $request, int $id): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['rating.edit']);

        try {
            $rating = $this->service->getRatingById((int) $id);
            $this->service->updateRating($rating, $request->validated());
            $this->storeActionLog(ActionType::UPDATED, ['rating' => $rating]);
            return redirect()->route('admin.ratings.index')->with('success', __('Rating updated successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to update rating.'));
        }
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['rating.delete']);

        try {
            $rating = $this->service->getRatingById((int) $id);
            $this->service->deleteRating($rating);
            $this->storeActionLog(ActionType::DELETED, ['rating' => $rating]);
            return redirect()->route('admin.ratings.index')->with('success', __('Rating deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete rating.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['rating.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.ratings.index')
                ->with('error', __('No ratings selected for deletion'));
        }

        $ratings = $this->service->getRatingsByIds($ids);
        $deletedCount = 0;

        foreach ($ratings as $rating) {
            $rating = ld_apply_filters('rating_delete_before', $rating);
            $rating->delete();
            ld_apply_filters('rating_delete_after', $rating);

            $this->storeActionLog(ActionType::DELETED, ['rating' => $rating]);
            ld_do_action('rating_delete_after', $rating);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count ratings deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No ratings were deleted. Selected ratings may include protected accounts.'));
        }

        return redirect()->route('admin.ratings.index');
    }
}
