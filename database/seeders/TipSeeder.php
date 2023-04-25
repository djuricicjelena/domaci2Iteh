<?php

namespace Database\Seeders;

use App\Models\Tip;
use Illuminate\Database\Seeder;

class TipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tip::truncate();

        for ($i = 1; $i<11; $i++){
            Tip::create([
                'tip' => 'Tip-' . $i
            ]);
        }
    }
}
