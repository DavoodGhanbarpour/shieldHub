<?php

namespace App\Http\Requests\Admin;

use App\Rules\CommaSeparatedPrice;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RenewSubscriptionsByInboundsId extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'inbounds' => ['required', 'array'],
            'daysCount' => ['required_without:date', 'integer'],
            'date' => ['required_without:daysCount', 'date'],
            'price' => ['sometimes', new CommaSeparatedPrice()]
        ];
    }
}
