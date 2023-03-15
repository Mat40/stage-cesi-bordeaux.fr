<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('user')->insert([
            [
                'firstname' => "Matthieu",
                'lastname' => "Estines",
                'campus' => "Bordeaux",
                'grade' => "CPI A2 Info",
                'permission' => "user",
                'email' => "matthieu.estines@viacesi.fr",
                'password' => "test",
            ],
            [
                'firstname' => "Thomas",
                'lastname' => "Stenger",
                'campus' => "Bordeaux",
                'grade' => "CPI A2 Info",
                'permission' => "pilote",
                'email' => "thomas.stenger@viacesi.fr",
                'password' => "test",
            ],
            [
                'firstname' => "Timothee",
                'lastname' => "Lourme",
                'campus' => "Bordeaux",
                'grade' => "CPI A2 Info",
                'permission' => "admin",
                'email' => "timothee.lourme@viacesi.fr",
                'password' => "test",
            ]
        ]);
    }
}
