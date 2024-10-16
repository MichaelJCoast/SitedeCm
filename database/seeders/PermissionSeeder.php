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
            'name' => 'Editar posts e categorias',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('permissions')->insert([
            'id' => '2',
            'name' => 'Editar links',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('permissions')->insert([
            'id' => '3',
            'name' => 'Editar carousel',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('permissions')->insert([
            'id' => '4',
            'name' => 'Editar sobre & faq',
            'guard_name' => 'backpack',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
