<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\CareerApplication;

class CareerService
{
    /**
     * Get career applications with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getCareerApplications(array $filters = [])
    {
        $query = CareerApplication::applyFilters($filters);

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Delete a career application.
     *
     * @param CareerApplication $careerApplication
     * @return void
     */
    public function deleteCareerApplication(CareerApplication $careerApplication): void
    {
        $careerApplication->delete();
    }

    /**
     * Get career application by ID.
     *
     * @param int $id
     * @return CareerApplication|null
     */
    public function getCareerApplicationById(int $id): ?CareerApplication
    {
        return CareerApplication::find($id);
    }
}

