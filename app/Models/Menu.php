<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = [
        'menu_name',
        'cat_ids'
    ];

    protected $casts = [
        'cat_ids' => 'array',
    ];
}
