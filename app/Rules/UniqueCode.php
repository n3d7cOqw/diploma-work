<?php

namespace App\Rules;

use App\Models\RawUser;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniqueCode implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $rawUser = RawUser::where('unique_code', $value)->first();
        if (!isset($rawUser)) {
            $fail('Коду не знайдено');
        }else{
            $rawUser->delete();
        }

    }
}
