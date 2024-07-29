<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projection extends Model
{
    use HasFactory;
    protected $fillable = [
        'curriculum_id',
        'semester',
        'academic_semester',
        'projected_students',
        'year'
    ];

    /**
     * Relación con el modelo Curriculum.
     */
    public function curriculum()
    {
        return $this->belongsTo(Curriculum::class, 'curriculum_id');
    }
}
