<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Models\Lead;
use App\Models\User;
use App\Services\LeadService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeadController extends Controller
{
    public function __construct(
        private readonly LeadService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['lead.view']);

        $filters = [
            'search' => request('interest'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.leads.index', [
            'leads' => $this->service->getLeads($filters),
            'interests' => leadInterests(),
            'filters' => $filters,
            'users' => User::active()->role('agent')->get(),
            'breadcrumbs' => [
                'title' => __('Leads'),
            ],
        ]);
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['lead.delete']);

        try {
            $lead = $this->service->getLeadById((int) $id);
            $this->service->deleteLead($lead);
            $this->storeActionLog(ActionType::DELETED, ['lead' => $lead]);
            return redirect()->route('admin.leads.index')->with('success', __('Lead deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete lead.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['lead.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.leads.index')
                ->with('error', __('No leads selected for deletion'));
        }

        $leads = $this->service->getLeadsByIds($ids);
        $deletedCount = 0;

        foreach ($leads as $lead) {
            $lead = ld_apply_filters('lead_delete_before', $lead);
            $lead->delete();
            ld_apply_filters('lead_delete_after', $lead);

            $this->storeActionLog(ActionType::DELETED, ['lead' => $lead]);
            ld_do_action('lead_delete_after', $lead);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count leads deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No leads were deleted. Selected leads may include protected accounts.'));
        }

        return redirect()->route('admin.leads.index');
    }

    public function transfer(Request $request, Lead $lead)
    {
        $this->authorize('lead.transfer');

        $request->validate([
            'transfer_user_id' => ['required', 'exists:users,id'],
        ]);

        // prevent same transfer
        if ($lead->transfer_user_id == $request->transfer_user_id) {
            return back()->with('error', 'Lead already transferred to this user.');
        }

        $lead->update([
            'transfer_user_id' => $request->transfer_user_id,
        ]);

        return back()->with('success', 'Lead transferred successfully.');
    }

    public function transferred()
    {
        $this->checkAuthorization(Auth::user(), ['lead.view']);
        $filters = [
            'search' => request('interest'),
            'sort_field' => null,
            'sort_direction' => null,
            'transferred' => true,
        ];
        return view('backend.pages.leads.transfer', [
            'leads' => $this->service->getLeads($filters),
            'interests' => leadInterests(),
            'filters' => $filters,
            'users' => User::active()->role('agent')->get(),
            'breadcrumbs' => [
                'title' => __('Transferred Leads'),
            ],
        ]);

    }

}
