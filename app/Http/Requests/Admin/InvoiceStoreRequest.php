<?php

namespace App\Http\Requests\Admin;

use App\Rules\CommaSeparatedPrice;
use Illuminate\Foundation\Http\FormRequest;

class InvoiceStoreRequest extends FormRequest
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
            'user_id' => ['required', 'exists:users,id'],
            'date' => ['date', 'required'],
            'description' => ['string', 'nullable'],
            'credit' => ['required', new CommaSeparatedPrice()]
        ];
    }
}
