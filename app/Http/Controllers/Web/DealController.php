<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use App\Models\Nda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Storage;

class DealController extends Controller
{
    public function show(Deal $deal)
    {
        $deal->load(['company.shareholders', 'documents']);

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

        // Logic for signing: capture IP and generate PDF
        $ip_address = $request->ip();
        $timestamp = now()->toDateTimeString();
        $date = now()->format('F j, Y');

        $pdf = Pdf::loadView('pdf.nda', compact('deal', 'user', 'date', 'timestamp', 'ip_address'));
        $fileName = 'ndas/nda_' . $deal->id . '_' . $user->id . '_' . time() . '.pdf';
        
        Storage::disk('public')->put($fileName, $pdf->output());

        $nda->update([
            'status' => 'signed',
            'signed_at' => now(),
            'ip_address' => $ip_address,
            'file_path' => $fileName,
        ]);

        return back()->with('success', 'NDA signed electronically. Private Data Room access granted.');
    }
    public function toggleBookmark(Deal $deal)
    {
        $user = Auth::user();
        $user->bookmarkedDeals()->toggle($deal->id);

        return back()->with('success', 'Bookmark updated.');
    }
}
