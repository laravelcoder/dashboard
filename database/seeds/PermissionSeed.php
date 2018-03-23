<?php

use Illuminate\Database\Seeder;

class PermissionSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = [
            
            ['id' => 1, 'title' => 'user_management_access',],
            ['id' => 2, 'title' => 'user_management_create',],
            ['id' => 3, 'title' => 'user_management_edit',],
            ['id' => 4, 'title' => 'user_management_view',],
            ['id' => 5, 'title' => 'user_management_delete',],
            ['id' => 6, 'title' => 'permission_access',],
            ['id' => 7, 'title' => 'permission_create',],
            ['id' => 8, 'title' => 'permission_edit',],
            ['id' => 9, 'title' => 'permission_view',],
            ['id' => 10, 'title' => 'permission_delete',],
            ['id' => 11, 'title' => 'role_access',],
            ['id' => 12, 'title' => 'role_create',],
            ['id' => 13, 'title' => 'role_edit',],
            ['id' => 14, 'title' => 'role_view',],
            ['id' => 15, 'title' => 'role_delete',],
            ['id' => 16, 'title' => 'user_access',],
            ['id' => 17, 'title' => 'user_create',],
            ['id' => 18, 'title' => 'user_edit',],
            ['id' => 19, 'title' => 'user_view',],
            ['id' => 20, 'title' => 'user_delete',],
            ['id' => 21, 'title' => 'contact_management_access',],
            ['id' => 22, 'title' => 'contact_management_create',],
            ['id' => 23, 'title' => 'contact_management_edit',],
            ['id' => 24, 'title' => 'contact_management_view',],
            ['id' => 25, 'title' => 'contact_management_delete',],
            ['id' => 26, 'title' => 'contact_company_access',],
            ['id' => 27, 'title' => 'contact_company_create',],
            ['id' => 28, 'title' => 'contact_company_edit',],
            ['id' => 29, 'title' => 'contact_company_view',],
            ['id' => 30, 'title' => 'contact_company_delete',],
            ['id' => 31, 'title' => 'contact_access',],
            ['id' => 32, 'title' => 'contact_create',],
            ['id' => 33, 'title' => 'contact_edit',],
            ['id' => 34, 'title' => 'contact_view',],
            ['id' => 35, 'title' => 'contact_delete',],
            ['id' => 36, 'title' => 'clinic_access',],
            ['id' => 37, 'title' => 'clinic_create',],
            ['id' => 38, 'title' => 'clinic_edit',],
            ['id' => 39, 'title' => 'clinic_view',],
            ['id' => 40, 'title' => 'clinic_delete',],
            ['id' => 41, 'title' => 'clinic_management_access',],
            ['id' => 42, 'title' => 'location_access',],
            ['id' => 43, 'title' => 'location_create',],
            ['id' => 44, 'title' => 'location_edit',],
            ['id' => 45, 'title' => 'location_view',],
            ['id' => 46, 'title' => 'location_delete',],
            ['id' => 47, 'title' => 'website_access',],
            ['id' => 48, 'title' => 'website_create',],
            ['id' => 49, 'title' => 'website_edit',],
            ['id' => 50, 'title' => 'website_view',],
            ['id' => 51, 'title' => 'website_delete',],
            ['id' => 52, 'title' => 'analytic_access',],
            ['id' => 53, 'title' => 'analytic_create',],
            ['id' => 54, 'title' => 'analytic_edit',],
            ['id' => 55, 'title' => 'analytic_view',],
            ['id' => 56, 'title' => 'analytic_delete',],
            ['id' => 57, 'title' => 'adword_access',],
            ['id' => 58, 'title' => 'adword_create',],
            ['id' => 59, 'title' => 'adword_edit',],
            ['id' => 60, 'title' => 'adword_view',],
            ['id' => 61, 'title' => 'adword_delete',],

        ];

        foreach ($items as $item) {
            \App\Permission::create($item);
        }
    }
}
