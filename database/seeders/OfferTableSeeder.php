<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OfferTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('offer')->insert([
            [
                'title' => 'Technicien Informatique - Base de données',
                'type' => 'Stage',
                'mail' => 'Mail',
                'duration' => '3',
                'skills' => 'Connaissances en utilisation de SGBDD, connaître les base du langages SQL.',
                'salary' => '650',
                'release_date' => date('Y-m-d'),
                'number_of_places' => '2',
                'description' => "Poste en tant que Technicien en informatique pour participer à l'utilisation de données durant un projet dans l'entreprise.",
                'id_Company' => '2',
                'id_Address' => '3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
