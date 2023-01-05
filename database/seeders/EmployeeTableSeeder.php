<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use App\Models\Gender;
use App\Models\Wilaya;
use App\Models\Department;
use Illuminate\Support\Facades\DB;

class EmployeeTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('employees')->delete();
        $employees = new Employee();
        $employees->name = ['ar' => 'عمر سعودي', 'en' => 'Omar Saoudi'];
        $employees->date_birth = date('1998-07-13');
        $employees->joining_date = date('Y-m-d');
        $employees->address = 'حي تعاونية الامير عبد القادر';
        $employees->phone = '0666447689';
        $employees->activity = 'Activity';
        $employees->nif = '19980665736222';
        $employees->nic = '19980665736333';
        $employees->rcn = '19990666447689';
        $employees->art = '20000658494204';
        $employees->description = 'Employee';
        $employees->status = 'A';
        $employees->gender_id = 1;
        $employees->wilaya_id = 28;
        $employees->department_id = 1;
        $employees->year = '2023';
        $employees->save();
    }
}
