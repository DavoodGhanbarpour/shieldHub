<?php

namespace App\Http\Requests\Admin;

use App\Enums\UserStatus;
use App\Rules\Password;
use Illuminate\Foundation\Http\FormRequest;

class UserUpdateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['nullable', 'string', 'email'],
            'password' => ['nullable', new Password()],
            'role' => ['required', 'string'],
            'status' => ['required', 'in:'.UserStatus::toCSV()],
        ];
    }
}
