<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the card format types
 *
 * - OCG: Official Card Game (mainly Japan and Asia)
 * - TCG: Trading Card Game (mainly Western countries)
 */
enum CardFormat: string
{
    case OCG = 'ocg';
    case TCG = 'tcg';
}
