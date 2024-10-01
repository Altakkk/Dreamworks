<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Attendance>
 */
class AttendanceFactory extends Factory
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
            'student_id'=>$this->faker->numberBetween($min=1,$max=8),
            'stat_id'=>$this->faker->numberBetween($min=1,$max=8),
            'adate'=>$this->faker->dateTimeThisMonth(),
            'created_at'=>$this->faker->dateTimeThisMonth(),
            'updated_at'=>$this->faker->dateTimeThisMonth(),
        ];
    }
}
