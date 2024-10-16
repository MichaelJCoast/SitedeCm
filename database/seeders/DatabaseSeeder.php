<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            UserSeeder::class,
            RolesSeeder::class,
            PermissionSeeder::class,
            UserRolesSeeder::class,
            RolesPermissionSeeder::class,
            CategorySeeder::class,
            DepartmentSeeder::class,
            FunctionSeeder::class,
            MandateSeeder::class,
            SizeSeeder::class,
            StatusSeeder::class,
        ]);
    }
}
