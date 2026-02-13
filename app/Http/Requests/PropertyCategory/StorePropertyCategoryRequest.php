<?php

declare(strict_types=1);

namespace App\Http\Requests\PropertyCategory;

use App\Http\Requests\FormRequest;
use App\Services\Content\ContentService;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\Auth;

class StorePropertyCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->checkAuthorization(Auth::user(), ['property.category.create']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'name' => 'required|string|max:255|unique:property_categories,name',
            'slug' => 'nullable|string|max:255|unique:property_categories,slug',
        ];

        return ld_apply_filters('property.category.store.validation.rules', $rules);
    }
}
