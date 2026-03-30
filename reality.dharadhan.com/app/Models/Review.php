<?php

namespace App\Models;

use App\Models\Property;
use App\Traits\QueryBuilderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Review extends Model
{
    use HasFactory;
    use QueryBuilderTrait;
    use SoftDeletes;

    protected $fillable = [
        'property_id',
        'user_id',
        'rating',
        'comment',
        'review_date',
        'status',
    ];

    protected $dates = ['review_date', 'created_at', 'updated_at', 'deleted_at'];

    protected $casts = [
        'rating' => 'integer',
        'comment' => 'string',
        'review_date' => 'date',
    ];

     /**
     * Get searchable columns for the model.
     */
    protected function getSearchableColumns(): array
    {
        return ['rating', 'comment', 'review_date'];
    }

    /**
     * Get columns that should be excluded from sorting.
     */
    protected function getExcludedSortColumns(): array
    {
        return [];
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeRecent($query)
    {
        return $query->orderBy('review_date', 'desc');
    }

    public function scopeHighRating($query)
    {
        return $query->where('rating', '>=', 4);
    }

    public function scopeByUser($query, $userId)
    {
        return $query->where('user_id', $userId);
    }

    public function scopeForProperty($query, $propertyId)
    {
        return $query->where('property_id', $propertyId);
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
