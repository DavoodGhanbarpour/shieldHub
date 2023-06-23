<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class InboundStoreRequest extends FormRequest
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
            'title' => ['string', 'required'],
            'link' => ['string', 'required'],
            'ip' => ['ipv4', 'required'],
            'port' => ['numeric', 'required', 'between:0,65535'],
            'description' => ['string', 'nullable'],
            'date' => ['string', 'required', 'date_format:Y-m-d'],
        ];
    }
}
