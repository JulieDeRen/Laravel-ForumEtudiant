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
            'name' => $this->faker->name(),
            'photo' => $this->faker->image(storage_path('images'), 640, 480),
            'address'=> $this->faker->address(),
            'presentation'=>$this->faker->text(),
            'phone'=> $this->faker->phoneNumber(),
            'birthday'=>$this->faker->date(),
            'city_id' => rand(1, 15), // $this->faker->randomElement(City::pluck('id')),
            'remember_token' => Str::random(10),
            'user_id'=>rand(0, 99),
            'program_id'=>rand(0, 5),
            'degree_id'=>rand(0, 4),
            'completion_id'=>rand(0, 1),
        ];

    }
}
