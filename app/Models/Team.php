<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = ['name', 'role', 'bio', 'photo_url', 'email', 'sort_order', 'skills', 'tools'];

    protected $casts = [
        'skills' => 'array',
        'tools'  => 'array',
    ];
}
