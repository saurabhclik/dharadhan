<?php

namespace App\Providers;

use App\Services\MenuService\AdminMenuItem;
use App\Services\MenuService\AdminMenuService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class MenuServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->singleton('admin.menu', function ($app) {
            return new AdminMenuService();
        });
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->app->booted(function () {
            ld_add_filter('admin_menu_groups_before_sorting', [$this, 'addRealEstateManagerMenu']);
        });
    }

    public function addRealEstateManagerMenu(array $groups): array
    {
        // Real Estate Manager Menu Items
        $realEstateMenuItem = [
            // property
            (new AdminMenuItem())->setAttributes([
                'label' => __('Properties'),
                'icon' => 'lucide:locate',
                'route' => route('admin.properties.index'),
                'active' => Route::is('admin.properties.*'),
                'id' => 'property-manager',
                'priority' => 22,
                'permissions' => ['property.view', 'property.create', 'property.edit', 'property.delete']
            ]),

            //Property Categories
            (new AdminMenuItem())->setAttributes([
                'label' => __('Categories'),
                'icon' => 'lucide:tag',
                'route' => route('admin.property.categories.index'),
                'active' => Route::is('admin.property.categories.*'),
                'id' => 'property-category-manager',
                'priority' => 23,
                'permissions' => ['property.category.view', 'property.category.create', 'property.category.edit', 'property.category.delete']
            ]),

            //Agents
            (new AdminMenuItem())->setAttributes([
                'label' => __('Agents'),
                'icon' => 'lucide:map-pin',
                'route' => route('admin.agents.index'),
                'active' => Route::is('admin.agents.*'),
                'id' => 'agent-manager',
                'priority' => 24,
                'permissions' => ['agent.view', 'agent.create', 'agent.edit', 'agent.delete']
            ]),

            //review
            (new AdminMenuItem())->setAttributes([
                'label' => __('Property Reviews'),
                'icon' => 'lucide:message-circle',
                'route' => route('admin.reviews.index'),
                'active' => Route::is('admin.reviews.*'),
                'id' => 'reviews-manager',
                'priority' => 25,
                'permissions' => ['review.view', 'review.create', 'review.edit', 'review.delete']
            ]),

            //Property Engagement
            (new AdminMenuItem())->setAttributes([
                'label' => __('Engagements'),
                'icon' => 'lucide:users',
                'route' => route('admin.engagements.index'),
                'active' => Route::is('admin.engagements.*'),
                'id' => 'engagement-manager',
                'priority' => 26,
                'permissions' => ['engagement.view', 'engagement.create', 'engagement.edit', 'engagement.delete']
            ]),

            //activities
            (new AdminMenuItem())->setAttributes([
                'label' => __('Activities'),
                'icon' => 'lucide:activity',
                'route' => route('admin.activities.index'),
                'active' => Route::is('admin.activities.*'),
                'id' => 'activity-manager',
                'priority' => 26,
                'permissions' => ['activity.view', 'activity.create', 'activity.edit', 'activity.delete']
            ]),
        ];
        
        $allowedRealEstateMenu = [];

        foreach ($realEstateMenuItem as $menuItem) {
            $permissions = $menuItem->permissions ?? [];
    
            if (auth()->user()->canAny($permissions)) {
                $allowedRealEstateMenu[] = $menuItem;
            }
        }

        //Main Menu Item for Real Estate Manager
        $realEstateMainMenu = (new AdminMenuItem())->setAttributes([
            'label' => __('Master'),
            'icon' => 'lucide:ship',
            'route' => route('admin.properties.index'),
            'active' => Route::is('admin.properties.*'),
            'id' => 'location-manager',
            'priority' => 22,
            'permissions' => ['property.manager.view'],
            'children' => $allowedRealEstateMenu,
        ]);
        
        //leads menu
        $leadMenu = (new AdminMenuItem())->setAttributes([
            'label' => __('Lead Management'),
            'icon' => 'lucide:quote',
            'route' => route('admin.leads.index'),
            'active' => Route::is('admin.leads.*'),
            'id' => 'lead-manager',
            'priority' => 23,
            'permissions' => ['lead.view', 'lead.create', 'lead.edit', 'lead.delete'],
            'children' => [
                (new AdminMenuItem())->setAttributes([
                    'label' => __('All Leads'),
                    'icon' => 'lucide:list',
                    'route' => route('admin.leads.index'),
                    'active' => Route::is('admin.leads.index'),
                    'id' => 'all-leads',
                    'priority' => 1,
                    'permissions' => ['lead.view']
                ]),
                (new AdminMenuItem())->setAttributes([
                    'label' => __('Transferred Leads'),
                    'icon' => 'lucide:move',
                    'route' => route('admin.leads.transferred'),
                    'active' => Route::is('admin.leads.transferred'),
                    'id' => 'transferred-leads',
                    'priority' => 2,
                    'permissions' => ['lead.view']
                ]),
            ],
        ]);
        

        $ratingMenu = (new AdminMenuItem())->setAttributes([
            'label' => __('Ratings & Reviews'),
            'icon' => 'lucide:star',
            'route' => route('admin.ratings.index'),
            'active' => Route::is('admin.ratings.*'),
            'id' => 'rating-manager',
            'priority' => 24,
            'permissions' => ['rating.view', 'rating.create', 'rating.edit', 'rating.delete']
        ]);

        $careerApplicationMenu = (new AdminMenuItem())->setAttributes([
            'label' => __('Career Applications'),
            'icon' => 'lucide:briefcase',
            'route' => route('admin.career-applications.index'),
            'active' => Route::is('admin.career-applications.*'),
            'id' => 'career-application-manager',
            'priority' => 25,
            'permissions' => ['career.application.view', 'career.application.delete']
        ]);

        $groups[__('Main')][] = $realEstateMainMenu;
        $groups[__('Main')][] = $ratingMenu;
        $groups[__('Main')][] = $careerApplicationMenu;
        $groups[__('Main')][] = $leadMenu;

        return $groups;
    }

}
