<?php

namespace Database\Factories;

use Faker\Generator as Faker;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Log;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Question>
 */
class QuestionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        // $types = ['multi-choice', 'trueFalse', 'reading'];
        // $levels = ['a1', 'a2', 'b1', 'b2', 'c1', 'c2'];
        // return [
        //     'type' => $types[array_rand($types)],
        //     'level' => $levels[array_rand($levels)],
        //     'instruction' => $this->faker()->sentence(6),
        //     'content' => $this->faker()->sentence(10),
        //     'listening' => null,
        // ];
Log::info('I am in question factory');
        return [
            'type' => $this->faker->randomElement([
                'multi-choice', 'trueFalse', 'reading'
            ]),
            'level' => $this->faker->randomElement([
                'a1', 'a2', 'b1', 'b2', 'c1', 'c2'
            ]),
            'instruction' => $this->faker->sentence(6),
            'content' => $this->faker->sentence(10),
            'listening' => null,
        ];
        
    }
}
