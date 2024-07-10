<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\type_vinculation;

class Type_VinculationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('type_vinculations')->insert([
            ['description' => 'Docente Ocasional Tiempo Completo'],
            ['description' => 'Docente Ocasional Medio Tiempo'],
            ['description' => 'Docente de Cátedra'],
        ]);
    }
}
