<?php

namespace App\Data\YugiohProDeck;

use App\Data\YugiohProDeck\CardDto;
use Illuminate\Support\Collection;

/**
 * Data Transfer Object for wrapping API responses
 */
class ApiResponseDto
{
    /**
     * @param Collection<int,mixed> $data
     * @param array<string,mixed>|null $meta
     */
    public function __construct(
        public readonly Collection $data,
        public readonly ?array $meta = null,
    ) {}

    /**
     * Builds the response from a list of cards
     *
     * @param array<string,mixed> $response
     * @return self
     */
    public static function fromCardsArray(array $response): self
    {
        $cards = collect($response['data'] ?? [])->map(fn($card) => CardDto::fromArray($card));

        return new self(
            data: $cards,
            meta: $response['meta'] ?? null,
        );
    }

    /**
     * Builds the response from a list of sets
     *
     * @param array<int,array> $response
     * @return self
     */
    public static function fromSetsArray(array $response): self
    {
        $sets = collect($response)->map(fn($set) => SetDto::fromArray($set));

        return new self(
            data: $sets,
        );
    }

    /**
     * Builds the response from a list of archetypes
     *
     * @param array<int,array> $response
     * @return self
     */
    public static function fromArchetypesArray(array $response): self
    {
        $archetypes = collect($response)->map(fn($archetype) => ArchetypeDto::fromArray($archetype));

        return new self(
            data: $archetypes,
        );
    }

    /**
     * Gets the number of items in the response
     *
     * @return int
     */
    public function count(): int
    {
        return $this->data->count();
    }

    /**
     * Checks if the response data is empty
     *
     * @return bool
     */
    public function isEmpty(): bool
    {
        return $this->data->isEmpty();
    }

    /**
     * Converts the object to an associative array
     *
     * @return array<string,mixed>
     */
    public function toArray(): array
    {
        return [
            'data' => $this->data->map(fn($item) => $item->toArray())->toArray(),
            'meta' => $this->meta,
        ];
    }
}
