<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InboundUpdateRequest extends FormRequest
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
            'server_id' => ['integer', 'required', 'exists:users,id'],
            'title' => ['string', 'required'],
            'link' => ['string', 'required'],
            'port' => ['numeric', 'required', 'between:0,65535'],
            'description' => ['string', 'nullable'],
        ];
    }
}
