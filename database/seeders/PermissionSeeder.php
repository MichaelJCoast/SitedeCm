<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('permissions')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('permissions')->insert([
            'id' => '1',
            'name' => 'edit posts',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('permissions')->insert([
            'id' => '2',
            'name' => 'edit links',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
