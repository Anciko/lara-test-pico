<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $rolePermissions = [
            ['role_id' => 1, 'permission_id' => 1, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 2, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 3, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 4, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 5, 'created_at' => now(), 'updated_at' => now()],
            ['role_id' => 1, 'permission_id' => 6, 'created_at' => now(), 'updated_at' => now()],
        ];

        foreach ($rolePermissions as $key => $value) {
            DB::table('role_permission')->insert([
                $value
            ]);
        }

    }
}
