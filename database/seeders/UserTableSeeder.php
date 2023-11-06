<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //super admin
        $superAdmin = new User();
        $superAdmin->first_name = "Super";
        $superAdmin->last_name = "Admin";
        $superAdmin->email = "superadmin@prospectpal.com";
        $superAdmin->status = "active";
        $superAdmin->password = Hash::make('P@ssw0rd');
        $superAdmin->job_title = "1";
        $superAdmin->job_description = "Software Engineer";
        $superAdmin->industry = "1";
        $superAdmin->industry_description ="Retail";
        $superAdmin->save();

        $superAdmin->addRole('super_admin');

        //admin
        $admin = new User();
        $admin->first_name = "Test";
        $admin->last_name = "Admin";
        $admin->email = "admin@prospectpal.com";
        $admin->status = "active";
        $admin->password = Hash::make('P@ssw0rd');
        $admin->job_title = "1";
        $admin->job_description = "Software Engineer";
        $admin->industry = "1";
        $admin->industry_description ="Retail";
	$admin->save();

        $admin->addRole('admin');

        //user
        $user = new User();
        $user->first_name = "Test";
        $user->last_name = "User";
        $user->email = "testuser@prospectpal.com";
        $user->status = "active";
        $user->password = Hash::make('P@ssw0rd');
        $user->job_title = "1";
        $user->job_description = "Software Engineer";
        $user->industry = "1";
        $user->industry_description ="Retail";
	$user->save();

        $user->addRole('user');
    }
}
