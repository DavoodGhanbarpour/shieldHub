<?php

namespace App\Http\Requests\Admin;

use App\Rules\CommaSeparatedPrice;
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
            'tableCheckbox' => ['required', 'array'],
            'daysCount' => ['required_without:date', 'integer'],
            'date' => ['required_without:daysCount', 'date'],
            'price' => ['sometimes', new CommaSeparatedPrice()]
        ];
    }
}
