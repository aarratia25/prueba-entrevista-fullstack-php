<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class CommuneSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \DB::table('communes')->insert([
            ['id_com' => 1, 'id_reg' => 1, 'description' => 'Arica'],
            ['id_com' => 2, 'id_reg' => 1, 'description' => 'Camarones'],
            ['id_com' => 3, 'id_reg' => 2, 'description' => 'Iquique'],
            ['id_com' => 4, 'id_reg' => 2, 'description' => 'Alto Hospicio'],
        ]);
    }
}
