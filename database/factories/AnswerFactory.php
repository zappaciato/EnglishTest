<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Answer>
 */
class AnswerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    { 
        Log::info('I am in ANSWER factory');
        return [
            'answer_a' => $this->faker->word(1),
            'answer_b' => $this->faker->word(1),
            'answer_c' => $this->faker->word(1),
            'answer_d' => $this->faker->word(1),
            'correct' => $this->faker->randomElement([
                'answer_a',
                'answer_b',
                'answer_c',
                'answer_d',
            ]),
            'question_id' => $this->faker->unique()->numberBetween(1,30),
        ];
    }
}
