<?php 

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryBuilderTrait;

class CareerApplication extends Model
{
    use HasFactory;
    use QueryBuilderTrait;

    protected $fillable = [
        'name',
        'email',
        'phone',
        'position',
        'resume',
        'message'
    ];

    /**
    * Get searchable columns for the model.
    */
    protected function getSearchableColumns(): array
    {
        return ['name', 'email', 'phone', 'position', 'message', 'created_at'];
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

}
