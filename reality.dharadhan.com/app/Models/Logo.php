<?php
// app/Models/Logo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Logo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'image_path',
        'link_type',
        'property_id',
        'external_url',
        'badge_text',
        'badge_color',
        'sort_order',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer'
    ];

    /**
     * Get the property associated with the logo
     */
    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    /**
     * Get the image URL
     */
    public function getImageUrlAttribute()
    {
        return asset('storage/' . $this->image_path);
    }

    /**
     * Get the link URL
     */
    public function getLinkUrlAttribute()
    {
        if ($this->link_type == 'property' && $this->property_id) {
            return route('property.details', $this->property_id);
        } elseif ($this->link_type == 'url' && $this->external_url) {
            return $this->external_url;
        }
        return '#';
    }

    /**
     * Scope for active logos
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope for ordered logos
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order', 'asc')->orderBy('created_at', 'desc');
    }
}