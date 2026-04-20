<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title',
        'content',
        'author',
        'image',
    ];
    
    public function categories() {
        return $this->belongsToMany(
            Category::class,
            'blog_has_categories',
            'blog_id',
            'category_id',
        );
    }
    public function tags() {
        return $this->belongsToMany(
            Tags::class,
            'blog_has_tags',
            'blog_id',
            'tag_id',
        );
    }
}
