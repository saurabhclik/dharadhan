<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Models\Activity;
use App\Models\User;
use App\Services\ActivityService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ActivityController extends Controller
{
    public function __construct(
        private readonly ActivityService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['activity.view']);

        $filters = [
            'search' => request('search'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.activities.index', [
            'activities' => $this->service->getActivities($filters),
            'filters' => $filters,
            'breadcrumbs' => [
                'title' => __('Activities'),
            ],
        ]);
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['activity.delete']);

        try {
            $activity = $this->service->getActivityById((int) $id);
            $this->service->deleteActivity($activity);
            $this->storeActionLog(ActionType::DELETED, ['activity' => $activity]);
            return redirect()->route('admin.activities.index')->with('success', __('Activity deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete activity.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['activity.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.activities.index')
                ->with('error', __('No activities selected for deletion'));
        }

        $activities = $this->service->getActivitiesByIds($ids);
        $deletedCount = 0;

        foreach ($activities as $activity) {
            $activity = ld_apply_filters('activity_delete_before', $activity);
            $activity->delete();
            ld_apply_filters('activity_delete_after', $activity);

            $this->storeActionLog(ActionType::DELETED, ['activity' => $activity]);
            ld_do_action('activity_delete_after', $activity);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count activities deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No activities were deleted. Selected activities may include protected accounts.'));
        }

        return redirect()->route('admin.activities.index');
    }
}
