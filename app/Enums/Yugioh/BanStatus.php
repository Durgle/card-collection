<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the ban status categories for Yu-Gi-Oh! cards
 *
 * - FORBIDDEN: Card is banned and cannot be used
 * - SEMI_LIMITED: Card is semi-limited
 * - LIMITED: Card is limited
 */
enum BanStatus: string
{
    case FORBIDDEN = 'Forbidden';
    case SEMI_LIMITED = 'Semi-Limited';
    case LIMITED = 'Limited';
}
