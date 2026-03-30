<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Traits\QueryBuilderTrait;
use Illuminate\Support\Facades\Cache;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletes;

class Activity extends Model
{
    use HasFactory;
    use QueryBuilderTrait;

    protected $fillable = [
        'lead_id',
        'user_id',
        'type',
        'description',
        'scheduled_at',
        'completed_at',
        'property_id',
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    /**
     * Get searchable columns for the model.
     */
    protected function getSearchableColumns(): array
    {
        return ['type', 'description', 'scheduled_at', 'completed_at'];
    }

    /**
     * Get columns that should be excluded from sorting.
     */
    protected function getExcludedSortColumns(): array
    {
        return [];
    }


    public function lead()
    {
        return $this->belongsTo(Lead::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }

    public static function trackPropertyView($userId, $propertyId)
    {
        return self::create([
            'user_id' => $userId,
            'property_id' => $propertyId,
            'type' => 'property_view',
            'description' => 'Viewed property',
        ]);
    }

}
