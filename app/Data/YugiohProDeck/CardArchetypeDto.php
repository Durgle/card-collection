<?php

/**
 * Data Transfer Object for card archetype
 */
class ArchetypeDto
{
    public function __construct(
        public readonly string $archetypeName,
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
            archetypeName: $data['archetype_name'],
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
            'archetype_name' => $this->archetypeName,
        ];
    }
}
