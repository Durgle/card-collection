<?php

namespace Database\Factories\Yugioh;

use App\Models\Yugioh\Card;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Yugioh\CardImage>
 */
class CardImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {

        $filename = $this->faker->unique()->uuid;

        return [
            'card_id'     => Card::factory(),
            'filename'           => $filename,
            'filename_small'     => 'small_' . $filename,
            'filename_cropped'   => 'cropped_' . $filename,
            'primary'            => false,
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
     * Indicate that the image is the primary one.
     * 
     * @return static
     */
    public function primary(): static
    {
        return $this->state(fn() => ['primary' => true]);
    }
}
