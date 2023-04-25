<?php

namespace Database\Seeders;

use App\Models\Vezba;
use Illuminate\Database\Seeder;

class VezbaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vezba::truncate();

        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 50; $i++){
            Vezba::create([
                'naziv_vezbe' => $faker->sentence(2),
                'opis' => $faker->sentence(6),
                'trener_id' => rand(1,50),
                'tip_id' => rand(1,10)
            ]);
        }
    }
}
