<?php

namespace App\Enums\Yugioh;

/**
 * Enum representing the possible frame types of a Yu-Gi-Oh! card
 */
enum FrameType: string
{
    case NORMAL = 'normal';
    case EFFECT = 'effect';
    case RITUAL = 'ritual';
    case FUSION = 'fusion';
    case SYNCHRO = 'synchro';
    case XYZ = 'xyz';
    case LINK = 'link';
    case NORMAL_PENDULUM = 'normal_pendulum';
    case EFFECT_PENDULUM = 'effect_pendulum';
    case RITUAL_PENDULUM = 'ritual_pendulum';
    case FUSION_PENDULUM = 'fusion_pendulum';
    case SYNCHRO_PENDULUM = 'synchro_pendulum';
    case XYZ_PENDULUM = 'xyz_pendulum';
    case SPELL = 'spell';
    case TRAP = 'trap';
    case TOKEN = 'token';
    case SKILL = 'skill';
}
