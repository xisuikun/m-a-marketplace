<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            MarketplaceSeeder::class,
            OfferSeeder::class,
            ShareholderSeeder::class,
            NdaSeeder::class,
            MessageSeeder::class,
            DocumentSeeder::class,
        ]);
    }
}
