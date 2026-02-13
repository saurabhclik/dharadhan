<?php

declare(strict_types=1);

namespace App\Services;

use App\Models\Lead;

class LeadService
{
    /**
     * Get leads with filters
     *
     * @return \Illuminate\Pagination\LengthAwarePaginator
     */
    public function getLeads(array $filters = [])
    {
        $query = Lead::applyFilters($filters);

        if($filters['transferred'] ?? false) {
            $query->whereNotNull('transfer_user_id'); 
        }

        return $query->paginateData([
            'per_page' => $filters['per_page'] ?? config('settings.default_pagination') ?? 10,
        ]);
    }

    /**
     * Create a new lead.
     *
     * @param array $data
     * @return Lead
     */
    public function createLead(array $data): Lead
    {
        $lead = new Lead();
        $lead->fill($data);
        $lead->save();

        return $lead;
    }

    /**
     * Update an existing lead.
     *
     * @param Lead $lead
     * @param array $data
     * @return Lead
     */
    public function updateLead(Lead $lead, array $data): Lead
    {
        $lead->fill($data);
        $lead->save();

        return $lead;
    }

    /**
     * Delete a lead.
     *
     * @param Lead $lead
     * @return void
     */
    public function deleteLead(Lead $lead): void
    {
        $lead->delete();
    }

    /**
     * Get lead by ID.
     *
     * @param int $id
     * @return Lead|null
     */
    public function getLeadById(int $id): ?Lead
    {
        return Lead::find($id);
    }

    /**
     * Get leads by lead ids.
     *
     * @param int $userId
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getLeadsByIds(array $leadIds)
    {
        return Lead::whereIn('id', $leadIds)->get();
    }
}

