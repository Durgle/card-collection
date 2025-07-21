<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the card attributes
 */
enum CardAttribute: string
{
    case LIGHT = 'light';
    case DARK = 'dark';
    case WATER = 'water';
    case FIRE = 'fire';
    case EARTH = 'earth';
    case WIND = 'wind';
    case DIVINE = 'divine';

    /**
     * Get the label for the card attribute.
     * 
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::LIGHT => trans('yugioh.card_attributes.light'),
            self::DARK => trans('yugioh.card_attributes.dark'),
            self::WATER => trans('yugioh.card_attributes.water'),
            self::FIRE => trans('yugioh.card_attributes.fire'),
            self::EARTH => trans('yugioh.card_attributes.earth'),
            self::WIND => trans('yugioh.card_attributes.wind'),
            self::DIVINE => trans('yugioh.card_attributes.divine'),
        };
    }

    /**
     * Get the image URL for the card attribute.
     * 
     * @return string
     */
    public function image(): string
    {
        return asset("yugioh/attributes/" . strtoupper($this->value) . ".svg");
    }
}
