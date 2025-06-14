<?php

namespace App\Data\YugiohProDeck;

use App\Data\YugiohProDeck\CardSetDto;
use App\Data\YugiohProDeck\CardImageDto;
use App\Enums\Yugioh\FrameType;
use Illuminate\Support\Collection;
use App\Enums\Yugioh\LinkMarker;

/**
 * Data Transfer Object for a Yu-Gi-Oh! card
 */
class CardDto
{

    public function __construct(
        public readonly int $id,
        public readonly string $name,
        public readonly FrameType $frameType,
        public readonly ?string $type = null,
        public readonly ?string $desc = null,
        public readonly ?string $monsterDesc = null,
        public readonly ?string $pendDesc = null,
        public readonly ?int $atk = null,
        public readonly ?int $def = null,
        public readonly ?int $level = null,
        public readonly ?string $race = null,
        public readonly ?string $attribute = null,
        public readonly ?string $archetype = null,
        public readonly ?int $scale = null,
        public readonly ?int $linkval = null,
        public readonly ?array $linkMarkers = null,
        public readonly ?Collection $cardSets = null,
        public readonly ?Collection $cardImages = null,
        public readonly ?array $miscInfo = null,
        public readonly ?string $typeline = null,
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
            name: $data['name'],
            frameType: FrameType::tryFrom($data['frameType']),
            type: $data['type'] ?? null,
            desc: $data['desc'] ?? null,
            monsterDesc: $data['monster_desc'] ?? null,
            pendDesc: $data['pend_desc'] ?? null,
            atk: $data['atk'] ?? null,
            def: $data['def'] ?? null,
            level: $data['level'] ?? null,
            race: $data['race'] ?? null,
            attribute: $data['attribute'] ?? null,
            archetype: $data['archetype'] ?? null,
            scale: $data['scale'] ?? null,
            linkval: $data['linkval'] ?? null,
            linkMarkers: isset($data['linkmarkers']) ? LinkMarker::fromArray($data['linkmarkers']) : null,
            cardSets: isset($data['card_sets'])
                ? collect($data['card_sets'])->map(fn($set) => CardSetDto::fromArray($set))
                : null,
            cardImages: isset($data['card_images'])
                ? collect($data['card_images'])->map(fn($image) => CardImageDto::fromArray($image))
                : null,
            miscInfo: $data['misc_info'][0] ?? null,
            typeline: $data['typeline'] ?? null,
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
            'name' => $this->name,
            'frameType' => $this->frameType,
            'type' => $this->type,
            'desc' => $this->desc,
            'monster_desc' => $this->monsterDesc,
            'pend_desc' => $this->pendDesc,
            'atk' => $this->atk,
            'def' => $this->def,
            'level' => $this->level,
            'race' => $this->race,
            'attribute' => $this->attribute,
            'archetype' => $this->archetype,
            'scale' => $this->scale,
            'linkval' => $this->linkval,
            'linkmarkers' => $this->linkMarkers,
            'card_sets' => $this->cardSets?->map(fn($set) => $set->toArray())->toArray(),
            'card_images' => $this->cardImages?->map(fn($image) => $image->toArray())->toArray(),
            'misc_info' => $this->miscInfo,
            'typeline' => $this->typeline,
        ];
    }
}
