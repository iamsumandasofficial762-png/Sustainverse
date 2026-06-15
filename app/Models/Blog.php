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

    public function getContentAttribute($value)
    {
        if (!is_string($value)) {
            return $value;
        }

        return $this->normalizeEditorUploadUrls($value);
    }

    public function setContentAttribute($value)
    {
        $this->attributes['content'] = is_string($value)
            ? $this->normalizeEditorUploadUrls($value)
            : $value;
    }

    private function normalizeEditorUploadUrls(string $content): string
    {
        return preg_replace_callback(
            '/\b(src|href)=([\'"])(https?:)?\/\/[^\'"]+(\/uploads\/editor\/[^\'"]+)\2/i',
            function ($matches) {
                return $matches[1].'='.$matches[2].$matches[4].$matches[2];
            },
            $content
        );
    }
}
