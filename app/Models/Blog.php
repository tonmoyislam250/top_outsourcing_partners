<?php

namespace App\Models;

use App\Traits\HasCloudinaryImages;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory, HasCloudinaryImages;

    protected $fillable = ['title', 'content', 'image', 'image_public_id', 'user_id', 'type', 'keywords'];

    protected $casts = [
        'type' => 'string',
        'keywords' => 'array',
    ];

    /**
     * Scope for blog posts only
     */
    public function scopeBlogs($query)
    {
        return $query->where('type', 'blog');
    }

    /**
     * Scope for case studies only
     */
    public function scopeCaseStudies($query)
    {
        return $query->where('type', 'case_study');
    }

    /**
     * Get formatted type name
     */
    public function getFormattedTypeAttribute()
    {
        return $this->type === 'case_study' ? 'Case Study' : 'Blog Post';
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the blog's thumbnail image URL
     */
    public function getThumbnailImageAttribute()
    {
        return $this->getThumbnailUrl($this->image_public_id) ?: $this->image;
    }

    /**
     * Get the blog's medium image URL
     */
    public function getMediumImageAttribute()
    {
        return $this->getMediumUrl($this->image_public_id) ?: $this->image;
    }

    /**
     * Get the blog's large image URL
     */
    public function getLargeImageAttribute()
    {
        return $this->getLargeUrl($this->image_public_id) ?: $this->image;
    }
}
