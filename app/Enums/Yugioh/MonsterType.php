<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the possible monster types of a Yu-Gi-Oh! card
 */
enum MonsterType: string
{
    case SPELLCASTER = 'spellcaster';
    case DRAGON = 'dragon';
    case ZOMBIE = 'zombie';
    case WARRIOR = 'warrior';
    case BEAST_WARRIOR = 'beast-warrior';
    case BEAST = 'beast';
    case WINGED_BEAST = 'winged-beast';
    case FIEND = 'fiend';
    case FAIRY = 'fairy';
    case INSECT = 'insect';
    case DINOSAUR = 'dinosaur';
    case REPTILE = 'reptile';
    case FISH = 'fish';
    case SEA_SERPENT = 'sea-serpent';
    case AQUA = 'aqua';
    case PYRO = 'pyro';
    case THUNDER = 'thunder';
    case ROCK = 'rock';
    case PLANT = 'plant';
    case MACHINE = 'machine';
    case PSYCHIC = 'psychic';
    case DIVINE_BEAST = 'divine-beast';
    case WYRM = 'wyrm';
    case CYBERSE = 'cyberse';
    case ILLUSION = 'illusion';

    /**
     * Get the label for the card attribute.
     * 
     * @return string
     */
    public function label(): string
    {
        return match ($this) {
            self::SPELLCASTER => trans('yugioh.monster_types.spellcaster'),
            self::DRAGON => trans('yugioh.monster_types.dragon'),
            self::ZOMBIE => trans('yugioh.monster_types.zombie'),
            self::WARRIOR => trans('yugioh.monster_types.warrior'),
            self::BEAST_WARRIOR => trans('yugioh.monster_types.beast-warrior'),
            self::BEAST => trans('yugioh.monster_types.beast'),
            self::WINGED_BEAST => trans('yugioh.monster_types.winged-beast'),
            self::FIEND => trans('yugioh.monster_types.fiend'),
            self::FAIRY => trans('yugioh.monster_types.fairy'),
            self::INSECT => trans('yugioh.monster_types.insect'),
            self::DINOSAUR => trans('yugioh.monster_types.dinosaur'),
            self::REPTILE => trans('yugioh.monster_types.reptile'),
            self::FISH => trans('yugioh.monster_types.fish'),
            self::SEA_SERPENT => trans('yugioh.monster_types.sea-serpent'),
            self::AQUA => trans('yugioh.monster_types.aqua'),
            self::PYRO => trans('yugioh.monster_types.pyro'),
            self::THUNDER => trans('yugioh.monster_types.thunder'),
            self::ROCK => trans('yugioh.monster_types.rock'),
            self::PLANT => trans('yugioh.monster_types.plant'),
            self::MACHINE => trans('yugioh.monster_types.machine'),
            self::PSYCHIC => trans('yugioh.monster_types.psychic'),
            self::DIVINE_BEAST => trans('yugioh.monster_types.divine-beast'),
            self::WYRM => trans('yugioh.monster_types.wyrm'),
            self::CYBERSE => trans('yugioh.monster_types.cyberse'),
            self::ILLUSION => trans('yugioh.monster_types.illusion'),
        };
    }
}
