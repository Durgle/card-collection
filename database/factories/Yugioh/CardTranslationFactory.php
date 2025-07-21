<?php

namespace Database\Factories\Yugioh;

use App\Models\Language;
use App\Models\Yugioh\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Yugioh\CardTranslation>
 */
class CardTranslationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'card_id' => Card::factory(),
            'language_code' => Language::factory(),
            'name' => $this->faker->words(3, true),
            'description' => $this->faker->paragraph(),
            'pendulum_effect' => $this->faker->boolean(30) ? $this->faker->sentence() : null,
        ];
    }

    /**
     * Associate a specific card to the translation.
     *
     * @param Card $card
     * @return static
     */
    public function forCard(Card $card): static
    {
        return $this->state(fn() => [
            'card_id' => $card->id,
        ]);
    }

    /**
     * Associate a specific language to the translation.
     *
     * @param Language $language
     * @return static
     */
    public function forLanguage(Language $language): static
    {
        return $this->state(fn() => [
            'language_code' => $language->code,
        ]);
    }

    /**
     * Set the pendulum effect for the translation.
     *
     * @param string $effect
     * @return static
     */
    public function withPendulumEffect(string $effect): static
    {
        return $this->state(fn() => [
            'pendulum_effect' => $effect,
        ]);
    }

    /**
     * Set the pendulum effect to null.
     *
     * @param string $effect
     * @return static
     */
    public function withoutPendulumEffect(): static
    {
        return $this->state(fn() => [
            'pendulum_effect' => null,
        ]);
    }
}
