<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'group_code',
        'id_semester_subject',
        'id_teacher',
    ];

    public function semesterSubject()
    {
        return $this->belongsTo(SemesterSubject::class, 'id_semester_subject');
    }

    public function teacher()
    {
        return $this->belongsTo(Teacher::class, 'id_teacher');
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
