<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'content', 'image', 'user_id', 'type', 'keywords'];

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
}
