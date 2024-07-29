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
        return $this->belongsTo(Subject::class, 'id_subject', 'id');
    }

    public function block()
    {
        return $this->belongsTo(Block::class, 'id_block', 'id');
    }
}
