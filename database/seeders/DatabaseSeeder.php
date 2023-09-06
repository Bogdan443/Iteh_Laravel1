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
        $this->call(TipTableSeeder::class);
        $this->call(ProizvodjacTableSeeder::class);
        $this->call(InstrumentTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
