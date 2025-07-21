<?php

namespace Database\Factories\Yugioh;

use App\Models\Language;
use App\Models\Yugioh\Card;
use App\Enums\Yugioh\CardIcon;
use App\Enums\Yugioh\CardType;
use App\Enums\Yugioh\FrameType;
use App\Enums\Yugioh\LinkMarker;
use App\Enums\Yugioh\MonsterType;
use App\Enums\Yugioh\CardAttribute;
use App\Models\Yugioh\CardImage;
use App\Models\Yugioh\CardTranslation;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Yugioh\Card>
 */
class CardFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'frame_type' => $this->faker->randomElement(FrameType::cases()),
            'monster_type' => $this->faker->randomElement(MonsterType::cases()),
            'icon' => $this->faker->randomElement(CardIcon::cases()),
            'atk' => $this->faker->numberBetween(0, 4000),
            'def' => $this->faker->numberBetween(0, 4000),
            'attribute' => $this->faker->randomElement(CardAttribute::cases()),
            'level' => $this->faker->numberBetween(1, 12),
            'pendulumn_scale' => $this->faker->numberBetween(0, 13),
            'link_level' => $this->faker->numberBetween(1, 5),
            'type' => $this->faker->randomElements(CardType::cases(), rand(1, 3)),
            'link_marker' => $this->faker->randomElements(LinkMarker::cases(), rand(0, 4)),
            'password' => $this->faker->unique()->regexify('[A-Z0-9]{8}'),
        ];
    }

    /**
     * Create a monster card.
     * 
     * @return static
     */
    public function monsterCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::EFFECT,
            'atk' => $this->faker->numberBetween(500, 4000),
            'def' => $this->faker->numberBetween(500, 4000),
            'level' => $this->faker->numberBetween(1, 12),
            'type' => $this->faker->boolean(33) ? [CardType::EFFECT->value, CardType::TUNER->value] : [CardType::EFFECT->value],
            'attribute' => $this->faker->randomElement(CardAttribute::cases()),
            'monster_type' => $this->faker->randomElement(MonsterType::cases()),
            'icon' => null,
            'pendulumn_scale' => null,
            'link_level' => null,
            'link_marker' => [],
        ]);
    }

    /**
     * Create a spell card.
     * 
     * @return static
     */
    public function spellCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::SPELL,
            'atk' => null,
            'def' => null,
            'level' => null,
            'type' => [],
            'attribute' => null,
            'monster_type' => null,
            'icon' => $this->faker->randomElement([
                CardIcon::NORMAL,
                CardIcon::FIELD,
                CardIcon::CONTINUOUS,
                CardIcon::EQUIP,
                CardIcon::QUICK_PLAY,
                CardIcon::RITUAL,
            ]),
            'pendulumn_scale' => null,
            'link_level' => null,
            'link_marker' => [],
        ]);
    }

    /**
     * Create a trap card.
     * 
     * @return static
     */
    public function trapCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::TRAP,
            'atk' => null,
            'def' => null,
            'level' => null,
            'type' => [],
            'attribute' => null,
            'monster_type' => null,
            'icon' => $this->faker->randomElement([
                CardIcon::NORMAL,
                CardIcon::CONTINUOUS,
                CardIcon::COUNTER
            ]),
            'pendulumn_scale' => null,
            'link_level' => null,
            'link_marker' => [],
        ]);
    }

    /**
     * Create a fusion monster card.
     * 
     * @return static
     */
    public function fusionMonsterCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::FUSION,
            'atk' => $this->faker->numberBetween(100, 4000),
            'def' => $this->faker->numberBetween(100, 4000),
            'level' => $this->faker->numberBetween(1, 12),
            'type' => [CardType::FUSION->value, CardType::EFFECT->value],
            'attribute' => $this->faker->randomElement(CardAttribute::cases()),
            'monster_type' => $this->faker->randomElement(MonsterType::cases()),
            'icon' => null,
            'pendulumn_scale' => null,
            'link_level' => null,
            'link_marker' => null,
        ]);
    }

    /**
     * Create a synchro monster card.
     * 
     * @return static
     */
    public function synchroMonsterCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::SYNCHRO,
            'atk' => $this->faker->numberBetween(100, 4000),
            'def' => $this->faker->numberBetween(100, 4000),
            'level' => $this->faker->numberBetween(1, 12),
            'type' => $this->faker->boolean(33) ? [CardType::SYNCHRO->value, CardType::EFFECT->value, CardType::TUNER->value] : [CardType::SYNCHRO->value, CardType::EFFECT->value],
            'attribute' => $this->faker->randomElement(CardAttribute::cases()),
            'monster_type' => $this->faker->randomElement(MonsterType::cases()),
            'icon' => null,
            'pendulumn_scale' => null,
            'link_level' => null,
            'link_marker' => null,
        ]);
    }

    /**
     * Create a xyz monster card.
     * 
     * @return static
     */
    public function xyzMonsterCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::XYZ,
            'atk' => $this->faker->numberBetween(100, 4000),
            'def' => $this->faker->numberBetween(100, 4000),
            'level' => $this->faker->numberBetween(1, 12),
            'type' => [CardType::XYZ->value, CardType::EFFECT->value],
            'attribute' => $this->faker->randomElement(CardAttribute::cases()),
            'monster_type' => $this->faker->randomElement(MonsterType::cases()),
            'icon' => null,
            'pendulumn_scale' => null,
            'link_level' => null,
            'link_marker' => null,
        ]);
    }

    /**
     * Create a link monster card.
     * 
     * @return static
     */
    public function linkMonsterCard(): static
    {
        return $this->state(function () {
            $markers = $this->faker->randomElements(LinkMarker::cases(), rand(1, 3));
            return [
                'frame_type' => FrameType::LINK,
                'atk' => $this->faker->numberBetween(1000, 4000),
                'def' => null,
                'level' => null,
                'type' => [CardType::LINK->value],
                'attribute' => $this->faker->randomElement(CardAttribute::cases()),
                'monster_type' => $this->faker->randomElement(MonsterType::cases()),
                'icon' => null,
                'pendulumn_scale' => null,
                'link_level' => count($markers),
                'link_marker' => $markers,
            ];
        });
    }

    /**
     * Create a pendulum monster card.
     * 
     * @return static
     */
    public function pendulumMonsterCard(): static
    {
        return $this->state(fn() => [
            'frame_type' => FrameType::EFFECT_PENDULUM,
            'atk' => $this->faker->numberBetween(0, 3500),
            'def' => $this->faker->numberBetween(1, 3500),
            'level' => $this->faker->numberBetween(1, 12),
            'type' => [
                CardType::PENDULUM->value,
                CardType::EFFECT->value,
            ],
            'attribute' => $this->faker->randomElement(CardAttribute::cases()),
            'monster_type' => $this->faker->randomElement(MonsterType::cases()),
            'icon' => null,
            'pendulumn_scale' => $this->faker->numberBetween(0, 13),
            'link_level' => null,
            'link_marker' => [],
        ]);
    }

    /**
     * Set the card frame type.
     * 
     * @param FrameType $frameType
     * @return static
     */
    public function withFrameType(FrameType $frameType): static
    {
        return $this->state(fn() => [
            'frame_type' => $frameType,
        ]);
    }

    /**
     * Set the card attribute.
     * 
     * @param CardAttribute $attribute
     * @return static
     */
    public function withAttribute(?CardAttribute $attribute): static
    {
        return $this->state(fn() => [
            'attribute' => $attribute,
        ]);
    }

    /**
     * Set the card icon.
     * 
     * @param CardIcon $icon
     * @return static
     */
    public function withIcon(?CardIcon $icon): static
    {
        return $this->state(fn() => [
            'icon' => $icon,
        ]);
    }

    /**
     * Set the card type.
     * 
     * @param CardType|CardType[] $types
     * @return static
     */
    public function withType(CardType|array $types): static
    {
        $types = is_array($types) ? $types : [$types];
        return $this->state(fn() => [
            'type' => $types
        ]);
    }

    /**
     * Set the card link markers.
     * 
     * @param array $markers
     * @return static
     */
    public function withLinkMarkers(?array $markers): static
    {
        return $this->state(fn() => [
            'link_level' => $markers ? count($markers) : null,
            'link_marker' => $markers,
        ]);
    }

    /**
     * Set the card atk and def.
     * 
     * @param int $atk
     * @param int $def
     * @return static
     */
    public function withAtkDef(?int $atk, ?int $def): static
    {
        return $this->state(fn() => [
            'atk' => $atk,
            'def' => $def,
        ]);
    }

    /**
     * Create translations for the card.
     * 
     * @param bool $hasPendulumEffect
     * @return static
     */
    public function withImages(?int $count = null): static
    {
        return $this->afterCreating(function (Card $card) use ($count) {
            if ($count === null || $count < 1) {
                $count = rand(1, 3);
            }

            CardImage::factory()
                ->count($count)
                ->sequence(
                    ['primary' => true],
                    ...array_fill(1, $count - 1, ['primary' => false])
                )
                ->forCard($card)
                ->create();
        });
    }

    /**
     * Create translations for the card.
     * 
     * @param bool $hasPendulumEffect
     * @return static
     */
    public function withTranslations(bool $hasPendulumEffect = false): static
    {
        return $this->afterCreating(function (Card $card) use ($hasPendulumEffect) {
            $languages = Language::all();

            foreach ($languages as $language) {
                $factory = CardTranslation::factory()
                    ->forCard($card)
                    ->forLanguage($language);
                if ($hasPendulumEffect) {
                    $factory = $factory->withPendulumEffect($this->faker->sentence());
                } else {
                    $factory = $factory->withoutPendulumEffect();
                }
                $factory->create();
            }
        });
    }
}
