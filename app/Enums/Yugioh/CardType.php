<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the possible card types of a Yu-Gi-Oh! card
 */
enum CardType: string
{
    case NORMAL = 'normal';
    case EFFECT = 'effect';
    case RITUAL = 'ritual';
    case FUSION = 'fusion';
    case SYNCHRO = 'synchro';
    case XYZ = 'xyz';
    case TOON = 'toon';
    case SPIRIT = 'spirit';
    case UNION = 'union';
    case GEMINI = 'gemini';
    case TUNER = 'tuner';
    case FLIP = 'flip';
    case PENDULUM = 'pendulum';
    case LINK = 'link';
    case SKILL = 'skill';

    /**
     * Converts an array of strings to an array of valid LinkMarker enums.
     *
     * @param array<int, string> $values
     * @return array<int, self>
     */
    public static function fromArray(array $values): array
    {
        return array_values(array_filter(
            array_map(fn(string $value) => self::tryFrom($value), $values)
        ));
    }

    /**
     * Get the label for the card attribute.
     * 
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::NORMAL => trans('yugioh.card_types.normal'),
            self::EFFECT => trans('yugioh.card_types.effect'),
            self::RITUAL => trans('yugioh.card_types.ritual'),
            self::FUSION => trans('yugioh.card_types.fusion'),
            self::SYNCHRO => trans('yugioh.card_types.synchro'),
            self::XYZ => trans('yugioh.card_types.xyz'),
            self::TOON => trans('yugioh.card_types.toon'),
            self::SPIRIT => trans('yugioh.card_types.spirit'),
            self::UNION => trans('yugioh.card_types.union'),
            self::GEMINI => trans('yugioh.card_types.gemini'),
            self::TUNER => trans('yugioh.card_types.tuner'),
            self::FLIP => trans('yugioh.card_types.flip'),
            self::PENDULUM => trans('yugioh.card_types.pendulum'),
            self::LINK => trans('yugioh.card_types.link'),
            self::SKILL => trans('yugioh.card_types.skill'),
        };
    }
}
