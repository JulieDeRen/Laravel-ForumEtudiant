<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->sentence(),
            'comment' => $this->faker->paragraph(),
            'date'=>$this->faker->date(),
            'student_id'=>rand(0, 99),
            'comment_id'=>rand(0, 999),
            'user_id'=>rand(0, 99),
        ];
    }
}
