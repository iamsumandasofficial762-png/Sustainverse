<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'category_name',
        'parent_id',
        'category_slug',
        'description',
    ];

    public function blogs() {
        return $this->belongsToMany(
            Blog::class,
            'blog_has_categories',
            'category_id',
            'blog_id',
        );
    }
    
    // Parent category
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Child categories
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }
}
