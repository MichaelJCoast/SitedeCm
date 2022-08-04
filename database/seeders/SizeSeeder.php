<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SizeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('sizes')->truncate();
        Schema::enableForeignKeyConstraints();
        DB::table('sizes')->insert([
            'id' => '1',
            'name' => 'XS',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('sizes')->insert([
            'id' => '2',
            'name' => 'S',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('sizes')->insert([
            'id' => '3',
            'name' => 'M',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('sizes')->insert([
            'id' => '4',
            'name' => 'L',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
        DB::table('sizes')->insert([
            'id' => '5',
            'name' => 'XL',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),

        ]);
    }
}
