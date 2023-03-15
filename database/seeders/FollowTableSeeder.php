<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class FollowTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('follow')->insert([
            [    
                'id' => '1',
                'id_User' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
