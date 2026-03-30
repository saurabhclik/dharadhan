<?php

declare(strict_types=1);

namespace App\Http\Requests\PropertyCategory;

use App\Http\Requests\FormRequest;
use App\Services\Content\ContentService;
use Illuminate\Support\Facades\Auth;

class UpdatePropertyCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->checkAuthorization(Auth::user(), ['property.category.edit']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $propertyCategoryId = $this->route('category');

        $rules = [
            'name' => 'required|string|max:255|unique:property_categories,name,'.$propertyCategoryId,
            'slug' => 'nullable|string|max:255|unique:property_categories,slug,'.$propertyCategoryId,
        ];
        return ld_apply_filters('property.category.update.validation.rules', $rules);
    }
}
