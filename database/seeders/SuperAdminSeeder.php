<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    public function run(): void
    {
        DB::statement("
            INSERT INTO users (name, email, password, created_at, updated_at)
            VALUES (
                'Super Admin',
                'superadmin@gmail.com',
                '" . Hash::make('Password@1234') . "',
                NOW(),
                NOW()
            )
        ");

        $userId = DB::getPdo()->lastInsertId();

        DB::statement("
            INSERT INTO role_user (user_id, role_id)
            VALUES (
                {$userId},
                (SELECT id FROM roles WHERE name = 'SuperAdmin')
            )
        ");
    }
}
