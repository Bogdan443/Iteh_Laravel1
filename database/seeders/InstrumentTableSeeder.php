<?php

namespace Database\Seeders;

use App\Models\Instrument;
use Illuminate\Database\Seeder;

class InstrumentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 30; $i++) {

            Instrument::create([
                'model' => strtoupper($faker->bothify('? ##')),
                'cena' => rand(10000,80000),
                'proizvodjacId' => rand(1,5),
                'tipId' => rand(1,5),
            ]);
        }
    }
}
