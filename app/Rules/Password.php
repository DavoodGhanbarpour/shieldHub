<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Password implements ValidationRule
{
    /**
     * Run the validation rule.
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        request()->validate([
            $attribute => ['string', 'max:100', \Illuminate\Validation\Rules\Password::min(8)],
        ]);
    }
}
