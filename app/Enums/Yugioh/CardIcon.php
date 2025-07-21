<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the possible card icons in Yu-Gi-Oh!
 */
enum CardIcon: string
{
    case CONTINUOUS = 'continuous';
    case COUNTER = 'counter';
    case EQUIP = 'equip';
    case FIELD = 'field';
    case NORMAL = 'normal';
    case QUICK_PLAY = 'quick-play';
    case RITUAL = 'ritual';

    /**
     * Get the label for the card attribute.
     * 
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::CONTINUOUS => trans('yugioh.card_icons.continuous'),
            self::COUNTER => trans('yugioh.card_icons.counter'),
            self::EQUIP => trans('yugioh.card_icons.equip'),
            self::FIELD => trans('yugioh.card_icons.field'),
            self::NORMAL => trans('yugioh.card_icons.normal'),
            self::QUICK_PLAY => trans('yugioh.card_icons.quick-play'),
            self::RITUAL => trans('yugioh.card_icons.ritual'),
        };
    }

    /**
     * Get the image URL for the card attribute.
     * 
     * @return string
     */
    public function image(): string
    {
        return asset("yugioh/icons/" . strtoupper($this->value) . ".svg");
    }
}
