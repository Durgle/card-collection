<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing a link marker direction for Link Monsters in Yu-Gi-Oh!
 */
enum LinkMarker: string
{
    case BOTTOM_LEFT = 'bottom-left';
    case BOTTOM = 'bottom';
    case BOTTOM_RIGHT = 'bottom-right';
    case LEFT = 'left';
    case RIGHT = 'right';
    case TOP_LEFT = 'top-left';
    case TOP = 'top';
    case TOP_RIGHT = 'top-right';

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
}
