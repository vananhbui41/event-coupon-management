<?php

namespace Database\Factories;

use App\Models\Coupon;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Str;
// use Faker\Generator as Faker;

class CouponFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'code' => $this->faker->numerify('##########'),
            'ronline_coupon_code' => $this->faker->numerify('ROC########'),
            'title' => $this->faker->name(),
            'name' => $this->faker->name(),
            'summary' => $this->faker->sentence(),
            'image' => $this->faker->image(null,300,300),
            'public_date' => $this->faker->dateTime(),
            'start_time' => $this->faker->dateTime(),
            'end_time' => $this->faker->dateTime(),
            'type' => $this->faker->numberBetween(0,1),
            'memo' => $this->faker->paragraph(),
            'number_of_members' => $this->faker->numberBetween(0,100),
        ];
    }
}
