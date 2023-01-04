<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Department;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('departments')->delete();

        $departments = [

            [
                'en'=> 'SARL',
                'ar'=> 'SARL',
            ],
            [
                'en'=> 'EURL',
                'ar'=> 'EURL',
            ],

        ];

        foreach ($departments as $department) {
            Department::create([
            'name' => $department,
            'description' => 'Good',
            ]);
        }
    }
}
