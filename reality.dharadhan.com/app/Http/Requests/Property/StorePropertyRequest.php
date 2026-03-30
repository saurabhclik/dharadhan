<?php

declare(strict_types=1);

namespace App\Http\Requests\Property;

use App\Http\Requests\FormRequest;
use App\Services\Content\ContentService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class StorePropertyRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->checkAuthorization(Auth::user(), ['property.create']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $currentYear = date('Y');

        $rules = [
            'property_category_id' => 'required|exists:property_categories,id',
            'title'                => 'required|string|max:255|unique:properties,title',
            'description'          => 'required|string',
            'featured_image'       => 'nullable|image|mimes:jpeg,png,jpg,gif|max:5120',
            'location'             => 'required|string|max:255',
            'admin_price'          => 'nullable|numeric|min:0',
            'price'                => 'required|numeric|min:0',
            'site_plan'            => 'required|in:yes,no',
            'current_status'       => 'required|string|max:255',
            'locality' => ['nullable', 'string', 'max:255'],
            'bedrooms'             => 'nullable|integer|min:0|max:10',
            'kitchens'             => 'nullable|integer|min:0|max:10',
            'bathrooms'            => 'nullable|integer|min:0|max:10',
            'property_type'        => 'required|string|in:' . implode(',', array_keys(\App\Models\Property::types())),
            'status'               => 'required|string|in:' . implode(',', array_keys(statuses())),
            'user_id'              => 'nullable|exists:users,id',
            'is_featured'          => 'sometimes|boolean',
            'smart_home_features'  => 'nullable|array',
            'images'               => 'nullable|array',
            'images.*'             => 'required|image|mimes:jpeg,png,jpg,gif|max:5120',

            // Conditional rule
            'plan_images'          => 'required_if:site_plan,yes|array',
            'plan_images.*'        => 'required_if:site_plan,yes|image|mimes:jpeg,png,jpg,gif|max:5120',
        ];

        return ld_apply_filters('property.store.validation.rules', $rules);
    }

    public function prepareForValidation()
    {
        $this->merge([
            'is_featured' => $this->boolean('is_featured'),
        ]);
    }
}
