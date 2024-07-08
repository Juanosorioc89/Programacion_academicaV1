<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use app\Models\Faculties;
use Illuminate\Support\Facades\DB;

class faculties_tableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        DB::table('faculties')->insert([
            [
                'name_program' => 'Facultad de Ingeniería y Ciencias Agropecuarias',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_program' => 'Facultad de Ciencias Económicas Administrativas y Contables',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_program' => 'Facultad de Educación',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name_program' => 'Facultad de Ciencias y Humanas',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
