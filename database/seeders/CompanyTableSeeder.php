<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    { 
        \DB::table('company')->insert([
        [    
            'name' => 'Google',    
            'activity_area' => 'WEB',
            'number_of_trainees' => '10000',
            'trust'=> '4.5',
            'description'=> 'super bien au top la machine',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [    
            'name' => 'Arianne',    
            'activity_area' => 'avion',
            'number_of_trainees' => '10000',
            'trust'=> '4.0',
            'description'=> 'ça decolle les avions et les fusées',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    
    
    
    ]);
            
    }
}
