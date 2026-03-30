<?php

namespace App\Models;

use App\Models\Image;
use App\Models\User;
use App\Traits\QueryBuilderTrait;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;
use App\Models\PropertyReaction;
use Illuminate\Support\Str;
class Property extends Model
{
    use HasFactory;
    use QueryBuilderTrait;
    use SoftDeletes;

    protected $fillable = [
        'property_category_id',
        'title',
        'description',
        'featured_image',
        'location',
        'locality_id',
        'size',
        'measurement',
        'facing',
        'corner',
        'admin_price',
        'price',
        'road',
        'dlc_rate',
        'site_plan',
        'reference_type',
        'reference_name',
        'reference_contact',
        'owner_name',
        'owner_contact',
        'current_status',
        'bedrooms',
        'kitchens',
        'bathrooms',
        'year',
        'property_type',
        'status',
        'user_id',
        'is_featured',
        'smart_home_features',
        'user_type',
        'mode',
        'type',
        'sub_type',
        'sub_type_item',
        'availability_status',
        'balconies',
        'bhks',
        'boundary_wall',
        'build_up_area',
        'carpet_area',
        'construction',
        'open_sides',
        'ownership',
        'price_negotiable',
        'super_build_up_area',
        'total_floors',
        'allowed_floors',
        'annual_dues',
        'booking_amount',
        'breadth',
        'expected_rental',
        'length',
        'maintenance_amount',
        'maintenance_type',
        'membership_charge',
        'plot_area',
        'possession_by',
        'min_seats',
        'max_seats',
        'cabins',
        'meeting_rooms',
        'conference_room',
        'pantry_type',
        'flooring_type',
        'wall_status',
        'washrooms_status',
        'washrooms',
        'furnishing',
        'central_ac',
        'oxygen_duct',
        'ups',
        'fire_safety',
        'washroom_type',
        'business_type',
        'road_width',
        'road_type',
        'property_facing',
        'approved_by'
    ];

    protected $casts = [
        'is_featured' => 'boolean',
        'smart_home_features' => 'array',
        'fire_safety' => 'array',
    ];

    public static function types(){
        return [
            "plot_land" => "Residential Land",
            "flat_apartment" => 'Residential Apartment',
            "independent_house_villa" => 'Independent House/Villa',
            "independent_builder_floor" => 'Independent Builder Floor',
            "office" => "Office",
            "retail" => "Retail",
            "plot_land_commercial" => "Commercial Land",
        ];
    }

    protected static function boot()
    {
        parent::boot();
    }

    public static function countByType(string $type): int
    {
        return self::where('property_type', $type)->count();
    }

    public static function countsByType(): array
    {
        return self::selectRaw('property_type, COUNT(*) as total')
            ->groupBy('property_type')
            ->pluck('total', 'property_type')
            ->toArray();
    }

    public static function typeStats(): array
    {
        $types  = self::types();
        $counts = self::countsByType();

        $data = [];

        foreach ($types as $key => $label) {
            $data[] = [
                'type'  => $key,
                'label' => $label,
                'count' => $counts[$key] ?? 0,
                'item' => self::getLiveImageByType($key),
            ];
        }
        return $data;
    }

    public static function getLiveImageByType(string $type)
    {
        return match ($type) {
            "flat_apartment" => ['name' => 'Residential Apartment', 'image' => asset("images/types/type_2.png")],
            "plot_land" => ['name' => 'Residential Land', 'image' => asset("images/types/type_1.png")],
            "independent_house_villa" => ['name' => 'Independent House/Villa', 'image' => asset("images/types/type_3.png")],
            "independent_builder_floor" => ['name' => 'Independent Builder Floor', 'image' => asset("images/types/type_4.png")],
            "office" => ['name' => 'Office', 'image' => asset("images/types/type_5.png")],
            "retail" => ['name' => 'Retail', 'image' => asset("images/types/type_6.png")],
            "plot_land_commercial" => ['name' => 'Commercial Land', 'image' => asset("images/types/type_7.png")],
            default => ['name' => 'Other', 'image' => asset("images/types/type_8.jpg")]
        };
    }

    public static function specifiedLocalities(): array
    {
        return [
            'C-Scheme',
            'Civil Lines',
            'Pratap Nagar',
            'Mansarovar',
            'Kalwar',
            'Jaipur',
            'Bani Park',
            'Raja Park',
            'Sodala',
            'Vidhyadhar Nagar',
            'Kartarpur',
            'Khatipura',
            'Ramganj',
            'Mahatma Gandhi Nagar',
            'Nirman Nagar',
            'Jalupura',
            'Jagatpura Road',
            'Sikar Road',
            'Amer Road',
            'Malviya Nagar',
        ];
    }

    public static function countsBySpecifiedLocalities(): array
{
    $localities = self::specifiedLocalities();
    $counts = [];

    foreach ($localities as $locality) 
    {
        $counts[$locality] = self::where('status', 'active')
            ->where(function ($q) use ($locality) {
                $q->whereHas('locality', function ($sub) use ($locality) {
                    $sub->where('name', $locality)
                        ->orWhere('slug', Str::slug($locality, '-'));
                })
                ->orWhere('location', 'LIKE', "%{$locality}%");
            })
            ->count();
    }

    arsort($counts);
    return $counts;
}

    public function agent(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class, 'imageable');
    }

    /**
     * Get searchable columns for the model.
     */
    protected function getSearchableColumns(): array
    {
        return ['title', 'description', 'property_type'];
    }

    /**
     * Get columns that should be excluded from sorting.
     */
    protected function getExcludedSortColumns(): array
    {
        return [];
    }

    public function scopeInactive(Builder $query): Builder
    {
        return $query->where('status', 'inactive');
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured(Builder $query): Builder
    {
        return $query->where('is_featured', true);
    }

    public function activate(): void
    {
        $this->update(['status' => 'active']);
    }

    public function reject(): void
    {
        $this->update(['status' => 'inactive']);
    }

    public function setYearBuiltAttribute($value)
    {
        $this->attributes['year_built'] = is_string($value) ? substr($value, 0, 4) : $value;
    }

    public static function countsByOwnershipTypes($type = null): array
    {
        $ownershipTypes = [
            'owner',
            'agent'
        ];
        $counts = [];

        foreach ($ownershipTypes as $ownertype) {
            $counts[$ownertype] = self::where('status', 'active')->where('user_type', $ownertype)->count();
        }

        return ($type && array_key_exists($type, $counts)) ? $counts[$type] : $counts;
    }

    public function getPricePerSqft()
    {
        if ($this->size > 0 && $this->price > 0) {
            return round($this->price / $this->size, 2);
        }

        return null;
    }

    public function reviews()
    {
        return $this->hasMany(Review::class, 'property_id');
    }

    public function similarProperties($limit = 3)
    {
        return Property::where('status', 'active')->where('id', '!=', $this->id)
            ->where('property_type', $this->property_type)
            ->whereBetween('price', [$this->price * 0.8, $this->price * 1.2])
            ->whereBetween('bedrooms', [$this->bedrooms - 1, $this->bedrooms + 1])
            ->whereBetween('bathrooms', [$this->bathrooms - 1, $this->bathrooms + 1])
            ->limit($limit)
            ->get();
    }

    public function category()
    {
        return $this->belongsTo(PropertyCategory::class, 'property_category_id');
    }

    public function scopeCategory(Builder $query, $category): Builder
    {
        return $query->where('category', $category);
    }

    public function scopePriceRange(Builder $query, $min, $max): Builder
    {
        return $query->whereBetween('price', [$min, $max]);
    }

    public function scopeBedrooms(Builder $query, $min, $max): Builder
    {
        return $query->whereBetween('bedrooms', [$min, $max]);
    }

    public function scopeBathrooms(Builder $query, $min, $max): Builder
    {
        return $query->whereBetween('bathrooms', [$min, $max]);
    }

    public function scopeAreaRange(Builder $query, $min, $max): Builder
    {
        return $query->whereBetween('area_sqft', [$min, $max]);
    }

    public function scopePropertyType(Builder $query, $type): Builder
    {
        return $query->where('property_type', $type);
    }

    public function viewCount()
    {
        return $this->activities()->where('type', 'property_view')->count();
    }

    public function activities()
    {
        return $this->hasMany(Activity::class);
    }

    public function reactions()
    {
        return $this->hasMany(PropertyReaction::class);
    }

    public function likes()
    {
        return $this->reactions()->where('type', 'like');
    }

    public function dislikes()
    {
        return $this->reactions()->where('type', 'dislike');
    }

    public function favourites()
    {
        return $this->reactions()->where('type', 'favourite');
    }

    public function locality()
    {
        return $this->belongsTo(Locality::class);
    }

    /**
     * Get all available localities grouped by category for dropdown
     */
    public static function getLocalitiesForDropdown()
    {
        return cache()->remember('localities_for_dropdown', 3600, function () {
            $localities = Locality::active()->orderBy('sort_order')->get();
            
            return [
                'nearby' => $localities->where('category', 'nearby')->pluck('name', 'id'),
                'popular' => $localities->where('category', 'popular')->pluck('name', 'id'),
                'other' => $localities->where('category', 'other')->pluck('name', 'id'),
                'all' => $localities->pluck('name', 'id'),
            ];
        });
    }
}
