<?php

namespace Database\Seeders;

use App\Models\Deal;
use App\Models\Message;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MessageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $deal = Deal::first();
        $sender = User::where('role', 'buyer')->first();
        $receiver = User::where('role', 'seller')->first();

        Message::create([
            'deal_id' => $deal->id,
            'sender_id' => $sender->id,
            'receiver_id' => $receiver->id,
            'content' => 'Hello, I am interested in your deal'
        ]);
    }
}
