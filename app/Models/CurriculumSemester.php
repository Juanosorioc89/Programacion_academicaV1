<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CurriculumSemester extends Model
{
    use HasFactory;
    public function subjects()
    {
        return $this->hasMany(Subject::class, 'id_curriculum_semester');
    }
}
