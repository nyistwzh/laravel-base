<?php

namespace App\Rules;

use App\Traits\VerifyTrait;
use Illuminate\Contracts\Validation\Rule;

class Mobile implements Rule
{

    use VerifyTrait;

    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->isMobile($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute format error.';
    }
}
