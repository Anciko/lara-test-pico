<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            ['name' => 'create_user', 'feature_id' => 1],
            ['name' => 'update_user', 'feature_id' => 1],
            ['name' => 'delete_user', 'feature_id' => 1],

            ['name' => 'create_role', 'feature_id' => 2],
            ['name' => 'update_role', 'feature_id' => 2],
            ['name' => 'delete_role', 'feature_id' => 2]
        ];

        foreach($permissions as $permission) {
            Permission::create($permission);
        }
    }
}
