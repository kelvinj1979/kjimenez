<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Aboutme extends Model
{
    protected $table = 'aboutme';
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'bio',
        'skills',
        'education',
        'experience',
        'projects'
    ];
}
