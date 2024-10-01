<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'course_id'=>$this->faker->numberBetween($min=1,$max=8),
            'firstName'=>fake()->name(),
            'lastName'=>fake()->name(),
            'gender'=>$this->faker->randomElement(['эрэгтэй','эмэгтэй']),
            'phoneNumber'=>fake()->name(),
            'RD'=>fake()->name(),
            'IsActive'=>$this->faker->boolean(),
        ];
    }
}
