<?php

namespace App\Models;

use App\Traits\QueryBuilderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Rating extends Model
{
    use HasFactory;
    use QueryBuilderTrait;

    protected $fillable = [
        'name',
        'location',
        'rating',
        'message',
        'device_hash',
        'ip_address',
        'is_testimonial',
        'status'
    ];

     /**
     * Get searchable columns for the model.
     */
    protected function getSearchableColumns(): array
    {
        return ['rating', 'message', 'created_at'];
    }

    /**
     * Get columns that should be excluded from sorting.
     */
    protected function getExcludedSortColumns(): array
    {
        return [];
    }
    
    public function scopeRecent($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeHighRating($query)
    {
        return $query->where('rating', '>=', 4);
    }

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopePendingReview($query)
    {
        return $query->where('status', 'review');
    }

    public function scopeModerated($query)
    {
        return $query->where('status', 'moderate');
    }

    public function scopeInactive($query)
    {
        return $query->where('status', 'inactive');
    }

    public function scopeAllStatuses($query)
    {
        return $query->whereIn('status', ['active', 'inactive', 'review', 'moderate']);
    }
}

