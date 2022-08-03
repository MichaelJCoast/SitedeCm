<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class FunctionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('cargos')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('cargos')->insert([
            'id' => '1',
            'type' => 'Presidente',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '2',
            'type' => 'Vice-Presidente',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '3',
            'type' => 'Tesoureira',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '4',
            'type' => 'Tesoureiro',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '5',
            'type' => 'Secretária',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '6',
            'type' => '1º Secretária',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '7',
            'type' => '2º Secretária',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '8',
            'type' => 'Dirigente',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '9',
            'type' => 'Colaborador',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('cargos')->insert([
            'id' => '10',
            'type' => 'Colaboradora',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
