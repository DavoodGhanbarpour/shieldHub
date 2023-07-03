<?php

namespace App\Http\Requests\Admin;

use App\Rules\CommaSeparatedPrice;
use Illuminate\Foundation\Http\FormRequest;

class AssignInboundsRequest extends FormRequest
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
            'inbounds' => ['array', 'nullable'],
            'inbounds.*.inbound_id' => ['required', 'exists:inbounds,id'],
            'inbounds.*.start_date' => ['required', 'date'],
            'inbounds.*.end_date' => ['required','date','after_or_equal:start_date'],
            'inbounds.*.subscription_per_month' => ['required', new CommaSeparatedPrice()],
            'inbounds.*.description' => ['nullable','string'],
        ];
    }
}
