<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class RenewSubscriptionsRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'users' => ['required', 'array'],
            'users.*.id' => ['integer', 'required', 'exists:users,id']
        ];
    }
}
