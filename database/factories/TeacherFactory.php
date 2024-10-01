<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Teacher>
 */
class TeacherFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'firstName'=>fake()->name(),
            'lastName'=>fake()->name(),
            'gender'=>$this->faker->randomElement(['эрэгтэй','эмэгтэй']),
            'phoneNumber'=>fake()->name(),
            'lesson'=>fake()->name(),
        ];
    }
}
