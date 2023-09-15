<?php

namespace App\Rules;

use Closure;
use Illuminate\Support\Facades\Hash;
use Illuminate\Contracts\Validation\ValidationRule;

class MatchOldPassword implements ValidationRule
{

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Get the current user
        $user = auth()->user();

        // Check if the given value matches the user's password
        if (!Hash::check($value, $user->password)) {
            // If not, fail the validation with a message
            $fail('The old password is incorrect.');
        }
    }
}
