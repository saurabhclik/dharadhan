<?php

declare(strict_types=1);

namespace App\Http\Requests\Rating;

use App\Http\Requests\FormRequest;
use App\Services\Content\ContentService;
use Illuminate\Support\Facades\Auth;

class UpdateRatingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->checkAuthorization(Auth::user(), ['rating.edit']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $ratingId = $this->route('rating');

        $rules = [
            'status' => 'required|string|in:active,inactive',
        ];

        return ld_apply_filters('rating.update.validation.rules', $rules);
    }
}
