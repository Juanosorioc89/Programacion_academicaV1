<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_subject',
        'subject_credit',
        'id_curriculum_semester',
        'id_area',
        'subject_code'
    ];

    public function area()
    {
        return $this->belongsTo(Areas::class, 'id_area', 'id');
    }

    public function curriculumSemester()
    {
        return $this->belongsTo(CurriculumSemester::class, 'id_curriculum_semester', 'id');
    }
    public function semesterSubjects()
    {
        return $this->hasMany(SemesterSubject::class, 'id_subject');
    }
}