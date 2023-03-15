<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AddressTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('address')->insert([
        [    
            'city' => 'Bordeaux',    
            'postal_code' => '33000',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [    
            'city' => 'Paris',    
            'postal_code' => '75000',
            'created_at' => now(),
            'updated_at' => now(),
        ],

        [    
            'city' => 'Saint-Médard-en-Jalles',    
            'postal_code' => '33160',
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [    
            'city' => 'Mérignac',    
            'postal_code' => '33700',
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
    }
}
