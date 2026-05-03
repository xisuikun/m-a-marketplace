<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function show(Deal $deal)
    {
        $messages = Message::where('deal_id', $deal->id)
            ->where(function($query) {
                $query->where('sender_id', Auth::id())
                      ->orWhere('receiver_id', Auth::id());
            })
            ->with(['sender', 'receiver'])
            ->oldest()
            ->get();

        return view('messages.show', compact('deal', 'messages'));
    }

    public function store(Request $request, Deal $deal)
    {
        $request->validate([
            'content' => 'required|string',
        ]);

        // Determine receiver (if sender is buyer, receiver is seller of the deal)
        $receiverId = Auth::id() === $deal->company->user_id 
            ? $deal->offers()->where('deal_id', $deal->id)->first()->user_id // Simple logic: reply to offerer
            : $deal->company->user_id;

        Message::create([
            'deal_id' => $deal->id,
            'sender_id' => Auth::id(),
            'receiver_id' => $receiverId,
            'content' => $request->content,
        ]);

        return back();
    }
}
