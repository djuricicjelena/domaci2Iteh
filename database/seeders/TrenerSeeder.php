<?php

namespace Database\Seeders;

use App\Models\Trener;
use Illuminate\Database\Seeder;

class TrenerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Trener::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++){
            Trener::create([
                'ime' => $faker->firstName,
                'prezime' => $faker->lastName,
                'email' => $faker->email
            ]);
        }
    }
}
