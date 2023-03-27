<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PossessesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('possesses')->insert([
            [    
                'id' => '1',
                'id_Area_activity' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
