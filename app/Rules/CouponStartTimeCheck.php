<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class CouponStartTimeCheck implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($end_time) {
        $this->end_time = $end_time;
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
        return ($value < $this->end_time);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '利用開始日時は利用終了日時より前の日時でなければなりません。';
    }
}
