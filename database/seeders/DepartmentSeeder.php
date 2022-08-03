<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('departments')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('departments')->insert([
            'id' => '1',
            'name' => 'Presidência',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '2',
            'name' => 'Mesa de Assembleia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '3',
            'name' => 'Departamento de Tecnologia',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '4',
            'name' => 'Departamento de Web',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '5',
            'name' => 'Departamento de Comunicação e Imagem',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '6',
            'name' => 'Departamento de Marketing',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '7',
            'name' => 'Departamento Recreativo e Cultural',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '8',
            'name' => 'Departamento Recreativo',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('departments')->insert([
            'id' => '9',
            'name' => 'Departamento Pedagógico',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
