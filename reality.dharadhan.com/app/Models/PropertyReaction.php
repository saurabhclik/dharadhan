<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\QueryBuilderTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PropertyReaction extends Model
{
    use HasFactory;
    use QueryBuilderTrait;

    protected $fillable = ['user_id', 'property_id', 'type'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}
