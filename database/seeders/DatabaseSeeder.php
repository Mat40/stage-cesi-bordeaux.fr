<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
       $this->call(CompanyTableSeeder::class);
       $this->call(AddressTableSeeder::class);
       $this->call(Area_activityTableSeeder::class);
       $this->call(CvTableSeeder::class);
       $this->call(FollowTableSeeder::class);
       $this->call(Located_atTableSeeder::class);
       $this->call(OfferTableSeeder::class);
       $this->call(Part_ofTableSeeder::class);
       $this->call(PossessesTableSeeder::class);
       $this->call(UserTableSeeder::class);
    }
}
