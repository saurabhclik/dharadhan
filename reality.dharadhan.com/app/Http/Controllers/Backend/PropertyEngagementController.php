<?php

declare(strict_types=1);

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Services\PropertyEngagementService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PropertyEngagementController extends Controller
{
    public function __construct(
        private readonly PropertyEngagementService $service,
    ) {
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->checkAuthorization(Auth::user(), ['engagement.view']);

        $filters = [
            'search' => request('search'),
            'status' => request('status'),
            'sort_field' => null,
            'sort_direction' => null,
        ];

        return view('backend.pages.engagements.index', [
            'engagements' => $this->service->getEngagements($filters),
            'filters' => $filters,
            'breadcrumbs' => [
                'title' => __('Engagements'),
            ],
        ]);
    }

}
