<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Projects extends Model
{
    protected $table = 'projects';  
    protected $primaryKey = 'project_id';
    protected $fillable = [
        'project_name',
        'project_img',
        'view_code',
        'live_demo',
        'description',
        'overview',
        'technologies',
        'tags',
        'project_info',
        'key_features',
        'challenges_solutions',
    ];
}
