<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Language::factory()->default()->create(['code' => 'en', 'name' => 'English']);
        Language::factory()->create(['code' => 'fr', 'name' => 'Français']);
        Language::factory()->create(['code' => 'de', 'name' => 'Deutsch']);
    }
}
