<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SemesterSubject extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_subject',
        'id_block',
        'students_number',
    ];

    public function subject()
    {
        return $this->belongsTo(Subjects::class, 'id_subject', 'id');
    }

    public function block()
    {
        return $this->belongsTo(Blocks::class, 'id_block', 'id');
    }
}
