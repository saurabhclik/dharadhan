<?php

declare(strict_types=1);

namespace App\Http\Requests\Review;

use App\Http\Requests\FormRequest;
use App\Services\Content\ContentService;
use Illuminate\Support\Facades\Auth;

class UpdateReviewRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->checkAuthorization(Auth::user(), ['review.edit']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        $reviewId = $this->route('review');

        $rules = [
            'status' => 'required|string|in:active,inactive,review,moderate|unique:reviews,status,'.$reviewId,
        ];

        return ld_apply_filters('review.update.validation.rules', $rules);
    }
}
