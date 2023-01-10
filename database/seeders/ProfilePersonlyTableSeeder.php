<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\ProfilePersonly;
use Illuminate\Support\Facades\DB;

class ProfilePersonlyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('profile_personlies')->insert([
            'id' => 1,
            'name' => 'Omar Saoudi',
            'email' => 'saoudiomar518@gmail.com',
            'address' => 'Msila/Algeria',
            'phone' => '+213666447689',
            'link_linkedin' => 'https://www.linkedin.com/in/omar-saoudi-ba98b217b/',
            'link_github' => 'https://github.com/OmarSaoudi',
            'link_facebook' => 'https://www.facebook.com/0omarsaoudi',
            'link_instgram' => 'https://www.instagram.com/oma.sa_/',
            'link_twitter' => 'https://twitter.com/Omarsao52651522',
            'description' => 'I am a web developer with a vast array of knowledge in many different front end and back end languages, responsive frameworks, databases, and best code practices. My objective is simply to be the best web developer that I can be and to contribute to the technology industry all that I know and can do. I am dedicated to perfecting my craft by learning from more seasoned developers, remaining humble, and continuously making strides to learn all that I can about development.',
        ]);
    }
}
