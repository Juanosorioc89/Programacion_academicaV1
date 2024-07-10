<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'last_name',
        'document_type',
        'id_number',
        'personal_email',
        'institutional_email',
        'adress',
        'phone_number',
        'number_mobile',
        'diplom',
        'id_vinculation_type',
    ];
    public function type_vinculation()
    {
        return $this->belongsTo(type_vinculation::class, 'id_vinculation_type');
    }
}
