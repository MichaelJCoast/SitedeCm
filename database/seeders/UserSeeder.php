<?php

namespace Database\Seeders;

use Carbon\Carbon;
use DB;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        DB::table('users')->truncate();
        Schema::enableForeignKeyConstraints();
        $name = $this->command->ask('Username');
        $mail = $this->command->ask("E-mail de {$name} (@utad.eu ou @aautad.pt)");
        $pass = $this->command->secret("Password de {$name}");
        DB::table('users')->insert([
            'id' => '1',
            'name' => $name,
            'email' => $mail,
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'password' => bcrypt($pass),
        ]);
    }
}
