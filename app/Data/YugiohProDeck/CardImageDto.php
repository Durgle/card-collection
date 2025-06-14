<?php

namespace App\Data\YugiohProDeck;

/**
 * Data Transfer Object representing card image URLs
 */
class CardImageDto
{
    public function __construct(
        public readonly int $id,
        public readonly string $imageUrl,
        public readonly string $imageUrlSmall,
        public readonly ?string $imageUrlCropped = null,
    ) {}

    /**
     * Creates an instance from an associative array
     *
     * @param array $data
     * @return self
     */
    public static function fromArray(array $data): self
    {
        return new self(
            id: $data['id'],
            imageUrl: $data['image_url'],
            imageUrlSmall: $data['image_url_small'],
            imageUrlCropped: $data['image_url_cropped'] ?? null,
        );
    }

    /**
     * Converts the object to an associative array
     *
     * @return array
     */
    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'image_url' => $this->imageUrl,
            'image_url_small' => $this->imageUrlSmall,
            'image_url_cropped' => $this->imageUrlCropped,
        ];
    }
}
