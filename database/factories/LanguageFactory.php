<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Language>
 */
class LanguageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $code = $this->faker->unique()->languageCode;

        return [
            'code' => $code,
            'name' => strtoupper($code),
            'is_default' => false,
        ];
    }

    /**
     * Indicate that the language is the default one.
     *
     * @return static
     */
    public function default(): static
    {
        return $this->state(fn() => [
            'is_default' => true,
        ]);
    }
}
