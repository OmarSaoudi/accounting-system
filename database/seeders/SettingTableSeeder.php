<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Setting;
use Illuminate\Support\Facades\DB;


class SettingTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('settings')->insert([
            'id' => 1,
            'current_session' => '2022-2023',
            'company_title' => 'OSC',
            'company_name' => 'Omar Saoudi Company',
            'address' => 'Cooperative Amir Abd El kader Msila',
            'phone' => '0666447689',
            'email' => 'info@exemple.com',
            'path_logo' => '/img/logo.png',
        ]);
    }
}
