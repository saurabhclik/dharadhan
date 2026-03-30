<?php

namespace App\Services\MenuService;

use App\Services\Content\ContentService;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class AdminMenuService
{
    /**
     * @var AdminMenuItem[][]
     */
    protected array $groups = [];

    /**
     * Add a menu item to the admin sidebar.
     *
     * @param  AdminMenuItem|array  $item  The menu item or configuration array
     * @param  string|null  $group  The group to add the item to
     *
     * @throws \InvalidArgumentException
     */
    public function addMenuItem(AdminMenuItem|array $item, ?string $group = null): void
    {
        $group = $group ?: __('Main');
        $menuItem = $this->createAdminMenuItem($item);
        if (! isset($this->groups[$group])) {
            $this->groups[$group] = [];
        }

        if ($menuItem->userHasPermission()) {
            $this->groups[$group][] = $menuItem;
        }
    }

    protected function createAdminMenuItem(AdminMenuItem|array $data): AdminMenuItem
    {
        if ($data instanceof AdminMenuItem) {
            return $data;
        }

        $menuItem = new AdminMenuItem();

        if (isset($data['children']) && is_array($data['children'])) {
            $data['children'] = array_map(
                function ($child) {
                    // Check if user is authenticated
                    $user = auth()->user();
                    if (! $user) {
                        return null;
                    }

                    // Handle permissions.
                    if (isset($child['permission'])) {
                        $child['permissions'] = $child['permission'];
                        unset($child['permission']);
                    }

                    $permissions = $child['permissions'] ?? [];
                    if (empty($permissions) || $user->hasAnyPermission((array) $permissions)) {
                        return $this->createAdminMenuItem($child);
                    }

                    return null;
                },
                $data['children']
            );

            // Filter out null values (items without permission).
            $data['children'] = array_filter($data['children']);
        }

        // Convert 'permission' to 'permissions' for consistency
        if (isset($data['permission'])) {
            $data['permissions'] = $data['permission'];
            unset($data['permission']);
        }

        // Handle route with params
        if (isset($data['route']) && isset($data['params'])) {
            $routeName = $data['route'];
            $params = $data['params'];

            if (is_array($params)) {
                $data['route'] = route($routeName, $params);
            } else {
                $data['route'] = route($routeName, [$params]);
            }
        }

        return $menuItem->setAttributes($data);
    }

    public function getMenu()
    {
        $this->addMenuItem([
            'label' => __('Dashboard'),
            'icon' => 'lucide:layout-dashboard',
            'route' => route('admin.dashboard'),
            'active' => Route::is('admin.dashboard'),
            'id' => 'dashboard',
            'priority' => 1,
            'permissions' => 'dashboard.view',
        ]);

        // Content Management Menu from registered post types
        try {
            $this->registerPostTypesInMenu();
        } catch (\Exception $e) {
            // Skip if there's an error
        }

        // Property Management Section
        $this->addMenuItem([
            'label' => __('Properties'),
            'icon' => 'lucide:building',
            'id' => 'properties-submenu',
            'active' => Route::is('admin.properties.*') || Route::is('admin.property.categories.*'),
            'priority' => 15,
            'permissions' => ['property.view', 'property.category.view'],
            'children' => [
                [
                    'label' => __('All Properties'),
                    'route' => route('admin.properties.index'),
                    'active' => Route::is('admin.properties.index') || Route::is('admin.properties.edit'),
                    'priority' => 10,
                    'permissions' => 'property.view',
                ],
                [
                    'label' => __('Add Property'),
                    'route' => route('admin.properties.create'),
                    'active' => Route::is('admin.properties.create'),
                    'priority' => 15,
                    'permissions' => 'property.create',
                ],
                [
                    'label' => __('Categories'),
                    'route' => route('admin.property.categories.index'),
                    'active' => Route::is('admin.property.categories.*'),
                    'priority' => 20,
                    'permissions' => 'property.category.view',
                ],
            ],
        ]);

        // Agents Management
        $this->addMenuItem([
            'label' => __('Agents'),
            'icon' => 'lucide:users',
            'id' => 'agents-submenu',
            'active' => Route::is('admin.agents.*'),
            'priority' => 16,
            'permissions' => ['agent.view'],
            'children' => [
                [
                    'label' => __('All Agents'),
                    'route' => route('admin.agents.index'),
                    'active' => Route::is('admin.agents.index') || Route::is('admin.agents.edit'),
                    'priority' => 10,
                    'permissions' => 'agent.view',
                ],
                [
                    'label' => __('Add Agent'),
                    'route' => route('admin.agents.create'),
                    'active' => Route::is('admin.agents.create'),
                    'priority' => 15,
                    'permissions' => 'agent.create',
                ],
            ],
        ]);

        // Leads Management
        $this->addMenuItem([
            'label' => __('Leads'),
            'icon' => 'lucide:mail',
            'id' => 'leads-submenu',
            'active' => Route::is('admin.leads.*'),
            'priority' => 17,
            'permissions' => ['lead.view'],
            'children' => [
                [
                    'label' => __('All Leads'),
                    'route' => route('admin.leads.index'),
                    'active' => Route::is('admin.leads.index'),
                    'priority' => 10,
                    'permissions' => 'lead.view',
                ],
                [
                    'label' => __('Transferred Leads'),
                    'route' => route('admin.leads.transferred'),
                    'active' => Route::is('admin.leads.transferred'),
                    'priority' => 15,
                    'permissions' => 'lead.view.transfer',
                ],
            ],
        ]);

        // Media Management Section
        $this->addMenuItem([
            'label' => __('Media'),
            'icon' => 'lucide:image',
            'id' => 'media-submenu',
            'active' => Route::is('admin.videos.*') || Route::is('admin.logos.*'),
            'priority' => 18,
            'permissions' => ['video.view', 'logo.view'],
            'children' => [
                [
                    'label' => __('Videos'),
                    'route' => route('admin.videos.index'),
                    'active' => Route::is('admin.videos.*'),
                    'priority' => 10,
                    'permissions' => 'video.view',
                ],
                [
                    'label' => __('Logo Slider'),
                    'route' => route('admin.logos.index'),
                    'active' => Route::is('admin.logos.*'),
                    'priority' => 15,
                    'permissions' => 'logo.view',
                ],
            ],
        ]);

        // Location Management
        $this->addMenuItem([
            'label' => __('Locations'),
            'icon' => 'lucide:map-pin',
            'id' => 'locations-submenu',
            'active' => Route::is('admin.localities.*'),
            'priority' => 19,
            'permissions' => ['locality.view'],
            'children' => [
                [
                    'label' => __('All Localities'),
                    'route' => route('admin.localities.index'),
                    'active' => Route::is('admin.localities.index') || Route::is('admin.localities.edit'),
                    'priority' => 10,
                    'permissions' => 'locality.view',
                ],
                [
                    'label' => __('Add Locality'),
                    'route' => route('admin.localities.create'),
                    'active' => Route::is('admin.localities.create'),
                    'priority' => 15,
                    'permissions' => 'locality.create',
                ],
            ],
        ]);

        // Reviews & Ratings
        $this->addMenuItem([
            'label' => __('Reviews'),
            'icon' => 'lucide:star',
            'id' => 'reviews-submenu',
            'active' => Route::is('admin.reviews.*') || Route::is('admin.ratings.*'),
            'priority' => 20,
            'permissions' => ['review.view', 'rating.view'],
            'children' => [
                [
                    'label' => __('All Reviews'),
                    'route' => route('admin.reviews.index'),
                    'active' => Route::is('admin.reviews.*'),
                    'priority' => 10,
                    'permissions' => 'review.view',
                ],
                [
                    'label' => __('Ratings'),
                    'route' => route('admin.ratings.index'),
                    'active' => Route::is('admin.ratings.*'),
                    'priority' => 15,
                    'permissions' => 'rating.view',
                ],
            ],
        ]);

        // Career Applications
        $this->addMenuItem([
            'label' => __('Career'),
            'icon' => 'lucide:briefcase',
            'route' => route('admin.career-applications.index'),
            'active' => Route::is('admin.career-applications.*'),
            'id' => 'career-applications',
            'priority' => 21,
            'permissions' => 'career.application.view',
        ]);

        // Activities
        $this->addMenuItem([
            'label' => __('Activities'),
            'icon' => 'lucide:activity',
            'route' => route('admin.activities.index'),
            'active' => Route::is('admin.activities.*'),
            'id' => 'activities',
            'priority' => 22,
            'permissions' => 'activity.view',
        ]);

        // Property Engagement
        $this->addMenuItem([
            'label' => __('Engagements'),
            'icon' => 'lucide:thumbs-up',
            'route' => route('admin.engagements.index'),
            'active' => Route::is('admin.engagements.*'),
            'id' => 'engagements',
            'priority' => 23,
            'permissions' => 'engagement.view',
        ]);

        $this->addMenuItem([
            'label' => __('Roles & Permissions'),
            'icon' => 'lucide:key',
            'id' => 'roles-submenu',
            'active' => Route::is('admin.roles.*') || Route::is('admin.permissions.*'),
            'priority' => 24,
            'permissions' => ['role.create', 'role.view', 'role.edit', 'role.delete'],
            'children' => [
                [
                    'label' => __('Roles'),
                    'route' => route('admin.roles.index'),
                    'active' => Route::is('admin.roles.index') || Route::is('admin.roles.edit'),
                    'priority' => 10,
                    'permissions' => 'role.view',
                ],
                [
                    'label' => __('New Role'),
                    'route' => route('admin.roles.create'),
                    'active' => Route::is('admin.roles.create'),
                    'priority' => 15,
                    'permissions' => 'role.create',
                ],
                [
                    'label' => __('Permissions'),
                    'route' => route('admin.permissions.index'),
                    'active' => Route::is('admin.permissions.index') || Route::is('admin.permissions.show'),
                    'priority' => 20,
                    'permissions' => 'role.view',
                ],
            ],
        ]);

        $this->addMenuItem([
            'label' => __('Users'),
            'icon' => 'feather:users',
            'id' => 'users-submenu',
            'active' => Route::is('admin.users.*'),
            'priority' => 25,
            'permissions' => ['user.create', 'user.view', 'user.edit', 'user.delete'],
            'children' => [
                [
                    'label' => __('All Users'),
                    'route' => route('admin.users.index'),
                    'active' => Route::is('admin.users.index') || Route::is('admin.users.edit'),
                    'priority' => 10,
                    'permissions' => 'user.view',
                ],
                [
                    'label' => __('New User'),
                    'route' => route('admin.users.create'),
                    'active' => Route::is('admin.users.create'),
                    'priority' => 15,
                    'permissions' => 'user.create',
                ],
            ],
        ]);

        $this->addMenuItem([
            'label' => __('Modules'),
            'icon' => 'lucide:boxes',
            'route' => route('admin.modules.index'),
            'active' => Route::is('admin.modules.index'),
            'id' => 'modules',
            'priority' => 26,
            'permissions' => 'module.view',
        ]);

        $this->addMenuItem([
            'label' => __('Monitoring'),
            'icon' => 'lucide:monitor',
            'id' => 'monitoring-submenu',
            'active' => Route::is('admin.actionlog.*'),
            'priority' => 27,
            'permissions' => ['pulse.view', 'actionlog.view'],
            'children' => [
                [
                    'label' => __('Action Logs'),
                    'route' => route('admin.actionlog.index'),
                    'active' => Route::is('admin.actionlog.index'),
                    'priority' => 10,
                    'permissions' => 'actionlog.view',
                ],
                [
                    'label' => __('Laravel Pulse'),
                    'route' => route('pulse'),
                    'active' => false,
                    'target' => '_blank',
                    'priority' => 15,
                    'permissions' => 'pulse.view',
                ],
            ],
        ]);

        $this->addMenuItem([
            'label' => __('Settings'),
            'icon' => 'lucide:settings',
            'id' => 'settings-submenu',
            'active' => Route::is('admin.settings.*') || Route::is('admin.translations.*'),
            'priority' => 28,
            'permissions' => ['settings.edit', 'translations.view'],
            'children' => [
                [
                    'label' => __('General Settings'),
                    'route' => route('admin.settings.index'),
                    'active' => Route::is('admin.settings.index'),
                    'priority' => 10,
                    'permissions' => 'settings.edit',
                ],
                [
                    'label' => __('Translations'),
                    'route' => route('admin.translations.index'),
                    'active' => Route::is('admin.translations.*'),
                    'priority' => 15,
                    'permissions' => ['translations.view', 'translations.edit'],
                ],
            ],
        ], __('More'));

        $this->addMenuItem([
            'label' => __('Logout'),
            'icon' => 'lucide:log-out',
            'route' => route('admin.dashboard'),
            'active' => false,
            'id' => 'logout',
            'priority' => 1,
            'html' => '
                <li>
                    <form method="POST" action="' . route('logout') . '">
                        ' . csrf_field() . '
                        <button type="submit" class="menu-item group w-full text-left menu-item-inactive text-gray-700 dark:text-white hover:text-gray-700">
                            <iconify-icon icon="lucide:log-out" class="menu-item-icon " width="16" height="16"></iconify-icon>
                            <span class="menu-item-text">' . __('Logout') . '</span>
                        </button>
                    </form>
                </li>
            ',
        ], __('More'));

        $this->groups = ld_apply_filters('admin_menu_groups_before_sorting', $this->groups);

        $this->sortMenuItemsByPriority();

        return $this->applyFiltersToMenuItems();
    }

    /**
     * Register post types in the menu
     */
    protected function registerPostTypesInMenu(): void
    {
        $contentService = app(ContentService::class);
        $postTypes = $contentService->getPostTypes();

        if ($postTypes->isEmpty()) {
            return;
        }

        foreach ($postTypes as $typeName => $type) {
            // Skip if not showing in menu.
            if (isset($type->show_in_menu) && ! $type->show_in_menu) {
                continue;
            }

            // Create children menu items.
            $children = [
                [
                    'title' => __("All {$type->label}"),
                    'route' => 'admin.posts.index',
                    'params' => $typeName,
                    'active' => request()->is('admin/posts/' . $typeName) ||
                        (request()->is('admin/posts/' . $typeName . '/*') && ! request()->is('admin/posts/' . $typeName . '/create')),
                    'priority' => 10,
                    'permissions' => 'post.view',
                ],
                [
                    'title' => __('Add New'),
                    'route' => 'admin.posts.create',
                    'params' => $typeName,
                    'active' => request()->is('admin/posts/' . $typeName . '/create'),
                    'priority' => 15,
                    'permissions' => 'post.create',
                ],
            ];

            // Add taxonomies as children of this post type if this post type has them.
            if (! empty($type->taxonomies)) {
                $taxonomies = $contentService->getTaxonomies()
                    ->whereIn('name', $type->taxonomies);

                foreach ($taxonomies as $taxonomy) {
                    $children[] = [
                        'title' => __($taxonomy->label),
                        'route' => 'admin.terms.index',
                        'params' => $taxonomy->name,
                        'active' => request()->is('admin/terms/' . $taxonomy->name . '*'),
                        'priority' => 20 + $taxonomy->id, // Prioritize after standard items
                        'permissions' => 'term.view',
                    ];
                }
            }

            // Set up menu item with all children.
            $menuItem = [
                'title' => __($type->label),
                'icon' => get_post_type_icon($typeName),
                'id' => 'post-type-' . $typeName,
                'active' => request()->is('admin/posts/' . $typeName . '*') ||
                    (! empty($type->taxonomies) && $this->isCurrentTermBelongsToPostType($type->taxonomies)),
                'priority' => 10,
                'permissions' => 'post.view',
                'children' => $children,
            ];

            $this->addMenuItem($menuItem, 'Content');
        }
    }

    protected function isCurrentTermBelongsToPostType(array $taxonomies): bool
    {
        if (! request()->is('admin/terms/*')) 
        {
            return false;
        }
        $currentTaxonomy = request()->segment(3);

        return in_array($currentTaxonomy, $taxonomies);
    }

    protected function sortMenuItemsByPriority(): void
    {
        foreach ($this->groups as &$groupItems) 
        {
            usort($groupItems, function ($a, $b) 
            {
                return (int) $a->priority <=> (int) $b->priority;
            });
        }
    }

    protected function applyFiltersToMenuItems(): array
    {
        $result = [];
        foreach ($this->groups as $group => $items)
        {
            $filteredItems = array_filter($items, function (AdminMenuItem $item) 
            {
                return $item->userHasPermission();
            });
            $filteredItems = ld_apply_filters('sidebar_menu_' . strtolower($group), $filteredItems);
            if (! empty($filteredItems)) 
            {
                $result[$group] = $filteredItems;
            }
        }

        return $result;
    }

    public function shouldExpandSubmenu(AdminMenuItem $menuItem): bool
    {
        if ($menuItem->active) 
        {
            return true;
        }
        foreach ($menuItem->children as $child) 
        {
            if ($child->active) 
            {
                return true;
            }
        }

        return false;
    }

    public function render(array $groupItems): string
    {
        $html = '';
        foreach ($groupItems as $menuItem) 
        {
            $filterKey = $menuItem->id ?? Str::slug($menuItem->label) ?: '';
            $html .= ld_apply_filters('sidebar_menu_before_' . $filterKey, '');

            $html .= view('backend.layouts.partials.menu-item', [
                'item' => $menuItem,
            ])->render();

            $html .= ld_apply_filters('sidebar_menu_after_' . $filterKey, '');
        }

        return $html;
    }
}