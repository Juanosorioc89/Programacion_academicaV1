<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use app\Models\ProgramType;

class ProgramTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        // Insertar los datos en la tabla
        DB::table('program_types')->insert([
            ['name_program_type' => 'Tecnólogo'],
            ['name_program_type' => 'Profesional'],
            ['name_program_type' => 'Especialización']]);
    }
}
