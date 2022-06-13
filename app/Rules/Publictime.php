<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Contracts\Validation\DataAwareRule;

class Publictime implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($start_time,$end_time) {
        $this->start_time = $start_time;
        $this->end_time = $end_time;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value) {
        return (
            ($value > $this->start_time) && 
            ($value < $this->end_time) );
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message() {
        return '公開開始日時は利用開始日時より前の日時でなければなりません。';
    }
}
