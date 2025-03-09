<?php

namespace App\Rules;

use App\Models\SystemConfigurations;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Carbon\Carbon;

class CheckAgeForFinancing implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $configs = SystemConfigurations::query()->first();

        $age = Carbon::parse($value)->age;

        if($age < $configs->minimum_age_for_financing){
            $fail("You must be at least {$configs->minimum_age_for_financing} years old.");
        }
    }
}
