<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\KycRequest;
use Illuminate\Support\Facades\Auth;

class KycController extends Controller
{
    public function showForm()
    {
        $user = Auth::user();
        if ($user->is_verified) {
            return redirect()->route('dashboard')->with('message', 'Your account is already verified.');
        }

        $pendingRequest = $user->kycRequests()->where('status', 'pending')->first();
        return view('kyc.form', compact('pendingRequest'));
    }

    public function submit(Request $request)
    {
        $request->validate([
            'document_type' => 'required|in:passport,id_card,driving_license,company_registration',
            'document_file' => 'required|file|mimes:pdf,jpg,jpeg,png|max:10240',
            'face_image' => 'nullable|file|mimes:jpg,jpeg,png|max:5120',
        ]);

        $user = Auth::user();

        $documentPath = $request->file('document_file')->store('kyc/documents', 'public');
        $faceImagePath = $request->hasFile('face_image') ? $request->file('face_image')->store('kyc/faces', 'public') : null;

        KycRequest::create([
            'user_id' => $user->id,
            'document_type' => $request->document_type,
            'document_path' => $documentPath,
            'face_image_path' => $faceImagePath,
            'status' => 'pending',
        ]);

        return redirect()->route('kyc.form')->with('success', 'KYC documents submitted successfully. Please wait for admin approval.');
    }

    public function indexAdmin()
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $requests = KycRequest::with('user')->latest()->get();
        return view('kyc.admin', compact('requests'));
    }

    public function approve(KycRequest $kycRequest)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $kycRequest->update(['status' => 'approved']);
        $kycRequest->user->update([
            'is_verified' => true,
            'face_verified_at' => $kycRequest->face_image_path ? now() : null,
            // Depending on doc type, we could set passport_id if we extracted it, but for now just mark verified
        ]);

        return back()->with('success', 'KYC Request approved.');
    }

    public function reject(Request $request, KycRequest $kycRequest)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403);
        }

        $kycRequest->update([
            'status' => 'rejected',
            'admin_notes' => $request->input('admin_notes', 'Documents not valid.'),
        ]);

        return back()->with('message', 'KYC Request rejected.');
    }
}
