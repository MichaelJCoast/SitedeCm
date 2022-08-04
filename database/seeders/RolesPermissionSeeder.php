<?php

namespace Database\Seeders;

use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RolesPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('role_has_permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('role_has_permissions')->insert([
            'permission_id' => '1',
            'role_id' => '2',
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '2',
            'role_id' => '2',
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '3',
            'role_id' => '2',
        ]);
        DB::table('role_has_permissions')->insert([
            'permission_id' => '4',
            'role_id' => '2',
        ]);
    }
}
