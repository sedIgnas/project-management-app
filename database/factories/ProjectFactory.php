<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Project>
 */
class ProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->cityPrefix(). ' ' .$this->faker->jobTitle(). ' project',
            'group_size' => rand(2, 10),
            'group_count' => rand(1, 5)
        ];
    }
}
