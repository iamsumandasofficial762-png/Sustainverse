<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Home extends Model
{
    protected $fillable = [
        'post_ids',
    ];

    protected $casts = [
        'post_ids' => 'array',
    ];
}
