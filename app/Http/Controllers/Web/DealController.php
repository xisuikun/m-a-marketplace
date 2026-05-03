<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Nda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DealController extends Controller
{
    public function show(Deal $deal)
    {
        // Public info is always accessible
        $canViewPrivate = false;

        if (Auth::check()) {
            $user = Auth::user();
            // Owner or Admin can always view
            if ($deal->company->user_id === $user->id || $user->role === 'admin') {
                $canViewPrivate = true;
            } else {
                // Check for signed NDA
                $canViewPrivate = $deal->hasNdaSignedByUser($user->id);
            }
        }

        return view('deals.show', compact('deal', 'canViewPrivate'));
    }

    public function requestNda(Request $request, Deal $deal)
    {
        $user = Auth::user();

        // Create or get existing NDA request
        $nda = Nda::firstOrCreate([
            'deal_id' => $deal->id,
            'user_id' => $user->id,
        ]);

        if ($nda->status === 'signed') {
            return back()->with('message', 'NDA already signed.');
        }

        // Logic for signing (simplified: just mark as signed for demo)
        $nda->update([
            'status' => 'signed',
            'signed_at' => now(),
        ]);

        return back()->with('success', 'NDA signed successfully. Private Data Room access granted.');
    }
}
