<?php

namespace Database\Seeders;
use App\Models\Day;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DayTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('days')->delete();

        $days = [

            [
                'en'=> 'Saturday',
                'ar'=> 'السبت'
            ],
            [
                'en'=> 'Sunday',
                'ar'=> 'الأحد'
            ],
            [
                'en'=> 'Monday',
                'ar'=> 'الاثنين'
            ],
            [
                'en'=> 'Tuesday',
                'ar'=> 'الثلاثاء'
            ],
            [
                'en'=> 'Wednesday',
                'ar'=> 'الأربعاء'
            ],
            [
                'en'=> 'Thursday',
                'ar'=> 'الخميس'
            ],
            [
                'en'=> 'Friday',
                'ar'=> 'الجمعة'
            ],

        ];

        foreach ($days as $d) {
            Day::create(['name' => $d]);
        }
    }
}
