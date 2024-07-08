<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_faculty',
        'id_program_type',
        'name_program',
        'program_code'
    ];

    public function faculty()
    {
        return $this->belongsTo(Faculties::class, 'id_faculty', 'id');
    }

    public function programType()
    {
        return $this->belongsTo(ProgramType::class, 'id_program_type', 'id');
    }
}
