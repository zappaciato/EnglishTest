<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        Log::info('I am in CATEGORY factory');
        return [
            'grammar' => $this->faker->numberBetween(0,1),
            'tenses' => $this->faker->numberBetween(0, 1),
            'present_simple' => $this->faker->numberBetween(0, 1),
            'vocabulary' => 0, //need one category true at least
            'business' => $this->faker->numberBetween(0, 1),
            'question_id' => $this->faker->unique()->numberBetween(1,8),
        ];
    }
}
