<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryBuilderTrait;
use App\Models\User;

class Lead extends Model
{
    use HasFactory;
    use QueryBuilderTrait;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'interest',
        'message',
        'status',
        'last_contacted_at',
        'user_id',
        'location',
        'transfer_user_id'
    ];

    protected $casts = [
        'last_contacted_at' => 'datetime',
    ];

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    /**
     * Get searchable columns for the model.
     */
    protected function getSearchableColumns(): array
    {
        return ['name', 'email', 'phone', 'interest', 'message', 'status', 'last_contacted_at', 'user_id','location'];
    }

    /**
     * Get columns that should be excluded from sorting.
     */
    protected function getExcludedSortColumns(): array
    {
        return [];
    }

    public function addActivity($type, $description)
    {
        $activity = $this->activities()->create([
            'type' => $type,
            'description' => $description,
        ]);

        return $activity;
    }

    public function markContacted()
    {
        $this->last_contacted_at = now();
        $this->save();
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function transferredTo()
    {
        return $this->belongsTo(User::class, 'transfer_user_id');
    }

}
