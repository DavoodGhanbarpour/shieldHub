<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ServerUpdateRequest extends FormRequest
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
            'title' => ['string', 'required'],
            'start_date' => ['date', 'required'],
            'end_date' => ['date', 'required'],
            'description' => ['text','nullable'],
            'subscription_price_per_month' => ['integer|max:10'],
        ];
    }
}
