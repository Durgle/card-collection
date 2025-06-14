<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing a link marker direction for Link Monsters in Yu-Gi-Oh!
 */
enum LinkMarker: string
{
    case BOTTOM_LEFT = 'Bottom-Left';
    case BOTTOM = 'Bottom';
    case BOTTOM_RIGHT = 'Bottom-Right';
    case LEFT = 'Left';
    case RIGHT = 'Right';
    case TOP_LEFT = 'Top-Left';
    case TOP = 'Top';
    case TOP_RIGHT = 'Top-Right';

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
