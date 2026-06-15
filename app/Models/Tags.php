<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $fillable = [
        'tags_name'
    ];

    public function blogs() {
        return $this->belongsToMany(
            Blog::class,
            'blog_has_tags',
            'tag_id',
            'blog_id',
        );
    }
}
