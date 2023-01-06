<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
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
        $this->call(UserTableSeeder::class);
        $this->call(DayTableSeeder::class);
        $this->call(GenderTableSeeder::class);
        $this->call(WilayaTableSeeder::class);
        $this->call(DepartmentTableSeeder::class);
        $this->call(AccountantTableSeeder::class);
        $this->call(EmployeeTableSeeder::class);
        $this->call(SettingTableSeeder::class);
    }
}
