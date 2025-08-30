<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Experience extends Model
{
    protected $table = 'experience';
    protected $primaryKey = 'experience_id';
    protected $fillable = [
        'experience',
        'company',
        'start_date',
        'end_date',
        'exp_detail',
    ];
}
