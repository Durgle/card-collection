<?php

namespace Database\Seeders;

use App\Enums\Yugioh\CardType;
use App\Enums\Yugioh\FrameType;
use App\Models\Yugioh\Card;
use App\Models\Yugioh\CardTranslation;
use Illuminate\Database\Seeder;

class YugiohCardSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Card::factory()->count(5)->monsterCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->monsterCard()->withFrameType(FrameType::NORMAL)->withType(CardType::NORMAL)->withTranslations()->withImages()->create();
        Card::factory()->count(5)->monsterCard()->withFrameType(FrameType::RITUAL)->withType(CardType::RITUAL)->withTranslations()->withImages()->create();
        Card::factory()->count(5)->spellCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->trapCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->fusionMonsterCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->synchroMonsterCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->xyzMonsterCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->linkMonsterCard()->withTranslations()->withImages()->create();
        Card::factory()->count(5)->pendulumMonsterCard()->withTranslations(true)->withImages()->create();
    }
}
