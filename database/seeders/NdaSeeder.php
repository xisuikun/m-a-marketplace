<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Nda;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class NdaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deal = Deal::first();
        $buyer = User::where('role', 'buyer')->first();

        Nda::create([
            'deal_id' => $deal->id,
            'user_id' => $buyer->id,
            'status' => 'signed',
            'signed_at' => now()
        ]);
    }
}
