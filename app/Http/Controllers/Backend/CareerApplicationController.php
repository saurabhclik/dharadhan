<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Enums\ActionType;
use App\Http\Controllers\Controller;
use App\Models\CareerApplication;
use App\Models\User;
use App\Services\CareerService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CareerApplicationController extends Controller
{
    public function __construct(
        private readonly CareerService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['career.application.view']);

        $filters = [
            'search' => request('search'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.career_applications.index', [
            'careerApplications' => $this->service->getCareerApplications($filters),
            'filters' => $filters,
            'breadcrumbs' => [
                'title' => __('Career Applications'),
            ],
        ]);
    }

    public function destroy(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['career.application.delete']);

        try {
            $careerApplication = $this->service->getCareerApplicationById((int) $id);
            $this->service->deleteCareerApplication($careerApplication);
            $this->storeActionLog(ActionType::DELETED, ['careerApplication' => $careerApplication]);
            return redirect()->route('admin.career_applications.index')->with('success', __('Career Application deleted successfully.'));
        } catch (\Throwable $th) {
            return redirect()->back()->with('error', __('Failed to delete career application.'));
        }
    }

    public function bulkDelete(Request $request): RedirectResponse
    {
        $this->checkAuthorization(Auth::user(), ['career.application.delete']);

        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.career_applications.index')
                ->with('error', __('No career applications selected for deletion'));
        }

        $careerApplications = $this->service->getCareerApplicationsByIds($ids);
        $deletedCount = 0;

        foreach ($careerApplications as $careerApplication) {
            $careerApplication = ld_apply_filters('career_application_delete_before', $careerApplication);
            $careerApplication->delete();
            ld_apply_filters('career_application_delete_after', $careerApplication);

            $this->storeActionLog(ActionType::DELETED, ['careerApplication' => $careerApplication]);
            ld_do_action('career_application_delete_after', $careerApplication);

            $deletedCount++;
        }

        if ($deletedCount > 0) {
            session()->flash('success', __(':count career applications deleted successfully', ['count' => $deletedCount]));
        } else {
            session()->flash('error', __('No career applications were deleted. Selected career applications may include protected accounts.'));
        }

        return redirect()->route('admin.career_applications.index');
    }

    public function downloadResume(int $id)
    {
        $this->checkAuthorization(Auth::user(), ['career.application.view']);

        $careerApplication = $this->service->getCareerApplicationById($id);

        if (!$careerApplication || empty($careerApplication->resume)) {
            return back()->with('error', __('Resume not found for this career application.'));
        }

        $disk = 'public';
        $filePath = $careerApplication->resume; // e.g. resumes/john_doe.pdf

        if (!Storage::disk($disk)->exists($filePath)) {
            return back()->with('error', __('Resume file does not exist.'));
        }

        $safeName = Str::slug($careerApplication->name);
        $extension = pathinfo($filePath, PATHINFO_EXTENSION);

        $downloadName = "Resume_{$careerApplication->id}_{$safeName}.{$extension}";

        return Storage::disk($disk)->download($filePath, $downloadName);
    }   
}
