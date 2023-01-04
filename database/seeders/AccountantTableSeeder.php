<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Accountant;
use App\Models\Gender;
use App\Models\Wilaya;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AccountantTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('accountants')->delete();
        $accountants = new Accountant();
        $accountants->name = ['ar' => 'بلقــــاسم سعودي', 'en' => 'Belkacem Saoudi'];
        $accountants->email = 'saoudibelkacem@outlook.fr';
        $accountants->password = Hash::make('1');
        $accountants->gender_id = 1;
        $accountants->wilaya_id = 28;
        $accountants->date_birth = date('1959-01-01');
        $accountants->joining_date = date('Y-m-d');
        $accountants->address = 'حي تعاونية الامير عبد القادر';
        $accountants->phone = '0550599880';
        $accountants->description = 'Accountant';
        $accountants->status = 'A';
        $accountants->save();
    }
}
