<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Faculties extends Model
{
    use HasFactory;

    public function programs()
    {
        return $this->hasMany(Program::class, 'id_faculty');
    }
}