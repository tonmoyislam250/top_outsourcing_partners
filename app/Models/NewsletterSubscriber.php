<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsletterSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'email',
        'subscribed_at',
        'is_active'
    ];

    protected $casts = [
        'subscribed_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    /**
     * Scope for active subscribers
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get formatted subscription date
     */
    public function getFormattedSubscribedAtAttribute()
    {
        return $this->subscribed_at->format('M d, Y');
    }
}
