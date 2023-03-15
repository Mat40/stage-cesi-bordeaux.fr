<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CvTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('cv')->insert([
            [    
                'file_name' => 'CV_Thomas',
                'file_path' => 'C:\CV_Thomas.pdf',
                'id_User' => '2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'file_name' => 'CV_Hugo',
                'file_path' => 'C:\CV_Hugo.pdf',
                'id_User' => '8',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'file_name' => 'CV_Matthieu',
                'file_path' => 'C:\CV_Mattiheu.pdf',
                'id_User' => '1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [    
                'file_name' => 'CV_Timothée',
                'file_path' => 'C:\CV_Timothée.pdf',
                'id_User' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
