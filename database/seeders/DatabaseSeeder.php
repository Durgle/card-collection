<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\YugiohCardSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        if (app()->environment('production')) {
            $this->call([
                LanguageSeeder::class,
            ]);
            return;
        } else {
            $this->call([
                LanguageSeeder::class,
                YugiohCardSeeder::class,
            ]);
        }
    }
}
