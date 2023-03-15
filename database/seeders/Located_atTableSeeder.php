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
                'id_Company' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'id' => '3',
                'id_Company' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'id' => '4',
                'id_Company' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
