<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (is_null(Admin::where('email', 'super@admin.com')->first())) {
            $admin = new Admin();
            $admin->name = "Super Admin";
            $admin->email = "admin@demo.com";
            $admin->username = "superadmin";
            $admin->phone = "01741022832";
            $admin->password = Hash::make('superadmin');
            $admin->save();
            $admin->assignRole('Admin');
        }
    }
}
