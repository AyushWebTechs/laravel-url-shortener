<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Company;
use App\Models\Role;

class DemoUsersSeeder extends Seeder
{
    public function run(): void
    {
        // Fetch roles
        $adminRole  = Role::where('name', 'Admin')->first();
        $memberRole = Role::where('name', 'Member')->first();

        /**
         * Create demo companies
         */
        $company1 = Company::firstOrCreate(['name' => 'Demo Company One']);
        $company2 = Company::firstOrCreate(['name' => 'Demo Company Two']);

        /**
         * Admins
         */
        $admin1Id = DB::table('users')->insertGetId([
            'name'       => 'Admin One',
            'email'      => 'admin1@company1.com',
            'password'   => Hash::make('password'),
            'company_id' => $company1->id,
        ]);

        $admin2Id = DB::table('users')->insertGetId([
            'name'       => 'Admin Two',
            'email'      => 'admin2@company2.com',
            'password'   => Hash::make('password'),
            'company_id' => $company2->id,
        ]);

        DB::table('role_user')->insert([
            ['user_id' => $admin1Id, 'role_id' => $adminRole->id],
            ['user_id' => $admin2Id, 'role_id' => $adminRole->id],
        ]);

        /**
         * Members
         */
        $member1Id = DB::table('users')->insertGetId([
            'name'       => 'Member One',
            'email'      => 'member1@company1.com',
            'password'   => Hash::make('password'),
            'company_id' => $company1->id,
        ]);

        $member2Id = DB::table('users')->insertGetId([
            'name'       => 'Member Two',
            'email'      => 'member2@company1.com',
            'password'   => Hash::make('password'),
            'company_id' => $company1->id,
        ]);

        DB::table('role_user')->insert([
            ['user_id' => $member1Id, 'role_id' => $memberRole->id],
            ['user_id' => $member2Id, 'role_id' => $memberRole->id],
        ]);
    }
}
