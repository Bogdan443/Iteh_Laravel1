<?php

namespace Database\Seeders;

use App\Models\Proizvodjac;
use Illuminate\Database\Seeder;

class ProizvodjacTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Proizvodjac::create([
            'proizvodjac' => 'Yamaha'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Marshall'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Aria'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Pioneer'
        ]);

        Proizvodjac::create([
            'proizvodjac' => 'Sterling'
        ]);

    }
}
