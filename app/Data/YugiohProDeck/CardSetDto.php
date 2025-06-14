<?php

/**
 * Data Transfer Object representing a Yu-Gi-Oh! card set
 */
class CardSetDto
{
    public function __construct(
        public readonly string $setName,
        public readonly string $setCode,
        public readonly string $setRarity,
        public readonly string $setRarityCode,
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
            setRarity: $data['set_rarity'],
            setRarityCode: $data['set_rarity_code']
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
            'set_rarity' => $this->setRarity,
            'set_rarity_code' => $this->setRarityCode
        ];
    }
}
