<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Locality extends Model
{
    use HasFactory;

    protected $table = 'localities';

    protected $fillable = [
        'name',
        'slug',
        'category',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'sort_order' => 'integer',
    ];

    // Scopes
    public function scopeNearby($query)
    {
        return $query->where('category', 'nearby');
    }

    public function scopePopular($query)
    {
        return $query->where('category', 'popular');
    }

    public function scopeOther($query)
    {
        return $query->where('category', 'other');
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('sort_order');
    }

    /**
     * Get localities grouped by category
     * 
     * @return array
     */
    public static function getGroupedByCategory(): array
    {
        return [
            'nearby_cities' => self::nearby()->active()->ordered()->get(['name', 'slug'])->toArray(),
            'popular_cities' => self::popular()->active()->ordered()->get(['name', 'slug'])->toArray(),
            'other_cities' => self::other()->active()->ordered()->get(['name', 'slug'])->toArray(),
        ];
    }

    /**
     * Get localities grouped by category as collections
     * 
     * @return array
     */
    public static function getGroupedCollection(): array
    {
        return [
            'nearby_cities' => self::nearby()->active()->ordered()->get(),
            'popular_cities' => self::popular()->active()->ordered()->get(),
            'other_cities' => self::other()->active()->ordered()->get(),
        ];
    }
}