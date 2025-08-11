<?php

namespace App\Models;

use App\Traits\HasCloudinaryImages;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasCloudinaryImages;
    protected $fillable = [
        'image',
        'image_public_id',
        'modal_image',
        'modal_image_public_id',
        'name',
        'title',
        'description',
        'education',
        'expertise',
        'vision',
        'is_principal'
    ];

    protected $casts = [
        'education' => 'array',
        'expertise' => 'array',
        'is_principal' => 'boolean'
    ];

    /**
     * Get the team member's thumbnail image URL
     */
    public function getThumbnailImageAttribute()
    {
        return $this->getThumbnailUrl($this->image_public_id) ?: $this->image;
    }

    /**
     * Get the team member's medium image URL
     */
    public function getMediumImageAttribute()
    {
        return $this->getMediumUrl($this->image_public_id) ?: $this->image;
    }

    /**
     * Get the team member's large image URL
     */
    public function getLargeImageAttribute()
    {
        return $this->getLargeUrl($this->image_public_id) ?: $this->image;
    }

    /**
     * Get the team member's modal thumbnail image URL
     */
    public function getModalThumbnailImageAttribute()
    {
        return $this->getThumbnailUrl($this->modal_image_public_id) ?: $this->modal_image;
    }

    /**
     * Get the team member's modal medium image URL
     */
    public function getModalMediumImageAttribute()
    {
        return $this->getMediumUrl($this->modal_image_public_id) ?: $this->modal_image;
    }

    /**
     * Get the team member's modal large image URL
     */
    public function getModalLargeImageAttribute()
    {
        return $this->getLargeUrl($this->modal_image_public_id) ?: $this->modal_image;
    }
}
