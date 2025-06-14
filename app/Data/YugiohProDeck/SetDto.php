<?php

namespace App\Data\YugiohProDeck;

use Illuminate\Support\Carbon;

/**
 * Data Transfer Object for card set
 */
class SetDto
{
    public function __construct(
        public readonly string $setName,
        public readonly string $setCode,
        public readonly int $numOfCards,
        public readonly ?Carbon $tcgDate = null,
        public readonly ?Carbon $ocgDate = null,
        public readonly ?string $setImage = null,
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
            setName: $data['set_name'],
            setCode: $data['set_code'],
            numOfCards: $data['num_of_cards'],
            tcgDate: isset($data['tcg_date']) ? Carbon::parse($data['tcg_date']) : null,
            ocgDate: isset($data['ocg_date']) ? Carbon::parse($data['ocg_date']) : null,
            setImage: isset($data['set_image']) ? Carbon::parse($data['set_image']) : null,
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
            'set_name' => $this->setName,
            'set_code' => $this->setCode,
            'num_of_cards' => $this->numOfCards,
            'tcg_date' => $this->tcgDate?->toDateString(),
            'ocg_date' => $this->ocgDate?->toDateString(),
            'set_image' => $this->setImage,
        ];
    }
}
