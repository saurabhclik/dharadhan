<?php

namespace App\Models;

use App\Models\Property;
use App\Traits\QueryBuilderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PropertyCategory extends Model
{
    use HasFactory;
    use QueryBuilderTrait;
    use SoftDeletes;

    protected $fillable = [
        'name',
        'slug',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'property_category_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

     /**
     * Get searchable columns for the model.
     */
    protected function getSearchableColumns(): array
    {
        return ['name', 'slug'];
    }

    /**
     * Get columns that should be excluded from sorting.
     */
    protected function getExcludedSortColumns(): array
    {
        return [];
    }

}
