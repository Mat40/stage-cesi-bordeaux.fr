<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class Located_atTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('located_at')->insert([
            [    
                'id' => '2',
                'company_id' => '1',
                'address_id' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'id' => '3',
                'company_id' => '2',
                'address_id' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'id' => '4',
                'company_id' => '2',
                'address_id' => '4',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
