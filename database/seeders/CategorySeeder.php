<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('categorias')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('categorias')->insert([
            'id' => '1',
            'name' => 'Recreativo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'id' => '2',
            'name' => 'Pedagógico',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('categorias')->insert([
            'id' => '3',
            'name' => 'Comunicado',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
