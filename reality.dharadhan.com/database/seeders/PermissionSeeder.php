<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $this->migratePermission();
    }


    public function migratePermission()
    {
        $permissions = [
            [
                'group_name' => 'Property Manager',
                'permissions' => [
                    'property.manager.view',
                ],
            ],
            [
                'group_name' => 'Property',
                'permissions' => [
                    'property.create',
                    'property.view',
                    'property.edit',
                    'property.delete',
                ],
            ],
            [
                'group_name' => 'Property Category',
                'permissions' => [
                    'property.category.create',
                    'property.category.view',
                    'property.category.edit',
                    'property.category.delete'
                ],
            ],
            [
                'group_name' => 'Agents',
                'permissions' => [
                    'agent.create',
                    'agent.view',
                    'agent.edit',
                    'agent.delete',
                ],
            ],
            [
                'group_name' => 'Reviews',
                'permissions' => [
                    'review.create',
                    'review.view',
                    'review.edit',
                    'review.delete',
                ],
            ],
            [
                'group_name' => 'Activities',
                'permissions' => [
                    'activity.create',
                    'activity.view',
                    'activity.edit',
                    'activity.delete',
                ],
            ],
            [
                'group_name' => 'Leads',
                'permissions' => [
                    'lead.create',
                    'lead.view',
                    'lead.edit',
                    'lead.delete',
                    'lead.transfer',
                    'lead.view.list',
                    'lead.view.transfer',
                ],
            ],
            [
                'group_name' => 'Frontend User',
                'permissions' => [
                    'frontend.user.create',
                    'frontend.user.view',
                    'frontend.user.edit',
                    'frontend.user.delete',
                ],
            ],
            [
                'group_name' => 'Frontend Property',
                'permissions' => [
                    'frontend.property.create',
                    'frontend.property.view',
                    'frontend.property.edit',
                    'frontend.property.delete',
                ],
            ],

            [
                'group_name' => 'Rating',
                'permissions' => [
                    'rating.create',
                    'rating.view',
                    'rating.edit',
                    'rating.delete',
                ],
            ],
            [
                'group_name' => 'Career Application',
                'permissions' => [
                    'career.application.view',
                    'career.application.delete',
                ],
            ],
            [
                'group_name' => 'Engagement',
                'permissions' => [
                    'engagement.view',
                ],
            ],
            [
                'group_name' => 'Video Management',
                'permissions' => [
                    'video.create',
                    'video.view',
                    'video.edit',
                    'video.delete',
                ],
            ],
            [
                'group_name' => 'Logo Management',
                'permissions' => [
                    'logo.create',
                    'logo.view',
                    'logo.edit',
                    'logo.delete',
                ],
            ],
            [
                'group_name' => 'Locality Management',
                'permissions' => [
                    'locality.create',
                    'locality.view',
                    'locality.edit',
                    'locality.delete',
                ],
            ],
        ];

        $roleSuperAdmin = Role::firstOrCreate(['name' => 'Superadmin']);

        for ($i = 0; $i < count($permissions); $i++) {
            $permissionGroup = $permissions[$i]['group_name'];
            for ($j = 0; $j < count($permissions[$i]['permissions']); $j++) {
                $permissionExist = Permission::where('name', $permissions[$i]['permissions'][$j])->first();
                if (is_null($permissionExist)) {
                    $permission = Permission::create(
                        [
                            'name' => $permissions[$i]['permissions'][$j],
                            'group_name' => $permissionGroup,
                            'guard_name' => 'web',
                        ]
                    );
                    $roleSuperAdmin->givePermissionTo($permission->name);
                    $permission->assignRole($roleSuperAdmin);
                }else{
                    $roleSuperAdmin->givePermissionTo($permissionExist);
                }
            }
        }
    }
}