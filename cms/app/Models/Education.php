<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Education extends Model
{
    protected $table = 'education';  

    protected $primaryKey = 'education_id';

    // Si tu clave primaria NO es autoincremental, agrega:
    // public $incrementing = false;

    // Si tu clave primaria NO es tipo integer, agrega:
    // protected $keyType = 'string';

    protected $fillable = [
        'education',
        'institution',
        'start_date',
        'end_date',
        'edu_detail',
    ];
}
