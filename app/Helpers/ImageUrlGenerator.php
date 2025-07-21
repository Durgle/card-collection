<?php

namespace App\Helpers;

use App\Models\Yugioh\CardImage;
use Illuminate\Support\Facades\Storage;

class ImageUrlGenerator
{
    /**
     * Generate the URL for a card image.
     *
     * @param string $filename
     * @param string|null $size
     * @return string
     */
    public static function forYugiohCard(CardImage $image, string $languageCode): string
    {
        $path = "yugioh/cards/{$languageCode}/{$image->filename}.webp";
        $defaultLanguageCode = config('card.yugioh_fallback_locale');
        $pathFallback = "yugioh/cards/{$defaultLanguageCode}/{$image->filename}.webp";

        if (Storage::disk('public')->exists($path)) {
            return asset($path);
        } else if (Storage::disk('public')->exists($pathFallback)) {
            return asset($pathFallback);
        }

        return asset("yugioh/cards/back.webp");
    }
}
