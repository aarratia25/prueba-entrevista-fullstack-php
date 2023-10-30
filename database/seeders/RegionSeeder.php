<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('regions')->insert([
            ['id_reg' => 1, 'description' => 'Región de Arica y Parinacota'],
            ['id_reg' => 2, 'description' => 'Región de Tarapacá'],
        ]);
    }
}
