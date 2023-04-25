<?php

namespace Database\Seeders;

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
        $this->call(TipSeeder::class);
        $this->call(TrenerSeeder::class);
        $this->call(VezbaSeeder::class);
    }
}
