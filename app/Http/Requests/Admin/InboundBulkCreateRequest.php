<?php

namespace App\Http\Requests\Admin;

use App\Rules\NetworkPortRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class InboundBulkCreateRequest extends FormRequest
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
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'inbounds' => ['array', 'required'],
            'inbounds.*.server_id' => ['required', 'exists:servers,id'],
            'inbounds.*.description' => ['string', 'nullable'],
            'inbounds.*.port' => [new NetworkPortRule()],
            'inbounds.*.link' => ['string', 'required'],
        ];
    }
}
