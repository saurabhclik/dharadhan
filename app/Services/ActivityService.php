<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Activity;

class ActivityService
{
    /**
     * Get activities with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getActivities(array $filters = [])
    {
        $query = Activity::has('property')->applyFilters($filters);

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Create a new review.
     *
     * @param array $data
     * @return Activity
     */
    public function createActivity(array $data): Activity
    {
        $activity = new Activity();
        $activity->fill($data);
        $activity->save();

        return $activity;
    }

    /**
     * Update an existing activity.
     *
     * @param Activity $activity
     * @param array $data
     * @return Activity
     */
    public function updateActivity(Activity $activity, array $data): Activity
    {
        $activity->fill($data);
        $activity->save();

        return $activity;
    }

    /**
     * Delete an activity.
     *
     * @param Activity $activity
     * @return void
     */
    public function deleteActivity(Activity $activity): void
    {
        $activity->delete();
    }

    /**
     * Get activity by ID.
     *
     * @param int $id
     * @return Activity|null
     */
    public function getActivityById(int $id): ?Activity
    {
        return Activity::find($id);
    }

    /**
     * Get activities by activity ids.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getActivitiesByIds(array $activityIds)
    {
        return Activity::whereIn('id', $activityIds)->get();
    }
}

