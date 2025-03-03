<?php

namespace App\Rules;

use App\Models\Branch;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class CheckMainBranchRule implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if($value == true){
            if(request()->method() === 'POST' && Branch::query()->where('is_main', true)->exists()){
                $fail("Main branch already exists");
            }
        }

    }
}
