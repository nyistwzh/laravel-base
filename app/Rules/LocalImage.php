<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Traits\VerifyTrait;

class LocalImage implements Rule
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
        return $this->fileExistsLocal($value);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return ':attribute file not found.';
    }
}
