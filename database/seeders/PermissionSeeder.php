<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //******************* Admin Permission */
     //
        //************************ADMIN PERMISSIONS ************************
        // Permission::create(['name' => 'Create-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Roles', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Role', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Role', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Read-Permissions', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Admins', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Admin', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Admin', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Users', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-User', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-User', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Advertiser', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Advertisers', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Advertiser', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Advertiser', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-AdvertiserType', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-AdvertiserTypes', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-AdvertiserType', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-AdvertiserType', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Advertising', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Advertisings', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Advertising', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Advertising', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Applicant', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Applicants', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Applicant', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Applicant', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Section', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Sections', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Section', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Section', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-Specialization', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Specializations', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-Specialization', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-Specialization', 'guard_name' => 'admin']);

        // Permission::create(['name' => 'Create-City', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Read-Cities', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Update-City', 'guard_name' => 'admin']);
        // Permission::create(['name' => 'Delete-City', 'guard_name' => 'admin']);


        // //************************USER PERMISSIONS ************************
        // Permission::create(['name' => 'Create-', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Read-', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Update-', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Delete-', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Read-Users', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Read-Advertisings', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Read-Sections', 'guard_name' => 'user']);

        // Permission::create(['name' => 'Create-Applicant', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Read-Applicants', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Update-Applicant', 'guard_name' => 'user']);
        // Permission::create(['name' => 'Delete-Applicant', 'guard_name' => 'user']);

        // // ************************Advertiser PERMISSIONS ************************

        // Permission::create(['name' => 'Create-Applicant', 'guard_name' => 'advertiser']);
        Permission::create(['name' => 'Read-Applicants', 'guard_name' => 'advertiser']);
        Permission::create(['name' => 'Update-Applicant', 'guard_name' => 'advertiser']);
        Permission::create(['name' => 'Delete-Applicant', 'guard_name' => 'advertiser']);

    }
}
