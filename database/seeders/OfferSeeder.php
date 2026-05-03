<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Deal;
use App\Models\Offer;
use Illuminate\Database\Seeder;

class OfferSeeder extends Seeder
{
    public function run(): void
    {
        $buyer = User::where('role', 'buyer')->first();
        $deal = Deal::first();

        if ($buyer && $deal) {
            Offer::create([
                'deal_id' => $deal->id,
                'user_id' => $buyer->id,
                'amount' => 4800000, // Trả giá 4.8 triệu
                'terms' => 'Thanh toán 70% ngay lập tức, 30% sau 6 tháng bàn giao công nghệ.',
                'status' => 'pending',
                'expires_at' => now()->addDays(30),
            ]);
        }
    }
}
