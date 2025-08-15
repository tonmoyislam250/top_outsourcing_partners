<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    protected $fillable = [
        'image',
        'modal_image',
        'name',
        'title',
        'description',
        'education',
        'expertise',
        'vision',
        'is_principal'
    ];

    protected $casts = [
        'education' => 'array',
        'expertise' => 'array',
        'is_principal' => 'boolean'
    ];
}
