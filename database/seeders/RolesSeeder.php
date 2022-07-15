<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('roles')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('roles')->insert([
            'id' => '1',
            'name' => 'admin',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('roles')->insert([
            'id' => '2',
            'name' => 'mod',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
