<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PortfolioItem extends Model
{
    protected $fillable = [
        'title', 'client', 'description', 'service_type',
        'url', 'image_url', 'completed_year', 'sort_order',
    ];
}
