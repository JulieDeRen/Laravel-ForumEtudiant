<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Internship>
 */
class InternshipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name(),
            'photo' => $this->faker->image(storage_path('images'), 640, 480),
            'date_start'=> $this->faker->date(),
            'date_end'=> $this->faker->date(),
            'description'=>$this->faker->text(),
            'contact_person'=> $this->faker->name(),
            'extension'=>$this->faker->number(),
            'email' => $this->faker->email(),
            'requirement' => $this->faker->text(),
            'link_apply'=>$this->faker->url(),
            'field_id'=>rand(0, 9),
        ];
    }
}
