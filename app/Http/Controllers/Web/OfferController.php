<?php

namespace App\Http\Controllers;

use App\Models\Deal;
use App\Models\Offer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OfferController extends Controller
{
    //
    public function store(Request $request, Deal $deal)
    {
        $request->validate([
            'amount' => 'required|numeric|min:1',
            'terms' => 'nullable|string',
        ]);

        // Check if user is buyer
        if (Auth::user()->role !== 'buyer') {
            return back()->with('error', 'Only buyers can submit offers.');
        }

        // Check if NDA is signed
        if (!$deal->hasNdaSignedByUser(Auth::id())) {
            return back()->with('error', 'You must sign the NDA first.');
        }

        Offer::create([
            'deal_id' => $deal->id,
            'user_id' => Auth::id(),
            'amount' => $request->amount,
            'terms' => $request->terms ?? 'Standard terms.',
            'status' => 'pending',
            'expires_at' => now()->addDays(30),
        ]);

        return back()->with('success', 'Your offer has been submitted to the seller!');
    }
}
