<?php

declare(strict_types=1);

namespace App\Http\Requests\User;

use App\Http\Requests\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateAgentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return $this->checkAuthorization(Auth::user(), ['agent.edit']);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $agentId = $this->route('agent');

        return ld_apply_filters('agent.update.validation.rules', [
            /** @example "Jane Smith" */
            'name' => 'required|max:50',

            /** @example "jane.smith@example.com" */
            'email' => 'required|max:100|email|unique:users,email,'.$agentId,

            /** @example "janesmith456" */
            'username' => 'required|max:100|unique:users,username,'.$agentId,

            /** @example "newPassword789" */
            'password' => $agentId ? 'nullable|min:6|confirmed' : 'required|min:6|confirmed',
            'status' => 'required|in:active,inactive,banned,suspended',
        ], $agentId);
    }
}
