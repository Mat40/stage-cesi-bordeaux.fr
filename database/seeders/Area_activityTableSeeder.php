<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Area_activityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('area_activity')->insert([
            [    
                'name' => 'Aviation',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'name' => 'Informatique',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'name' => 'Batiment',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'name' => 'Industrie',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'name' => 'Travaux publiques',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'name' => 'Commerce',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
