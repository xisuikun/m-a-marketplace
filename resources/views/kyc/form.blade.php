@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h1 class="text-3xl font-black text-slate-900">Identity Verification (KYC)</h1>
        <p class="text-slate-500 mt-2">Please provide your identification documents to access private data rooms and list businesses.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl border border-emerald-200 font-bold">
            {{ session('success') }}
        </div>
    @endif

    @if($pendingRequest)
        <div class="bg-blue-50 text-blue-700 p-8 rounded-2xl border border-blue-200 text-center">
            <i class="fa fa-clock text-4xl mb-4"></i>
            <h2 class="text-xl font-bold">Verification Pending</h2>
            <p class="mt-2">Your documents are currently being reviewed by our compliance team. This usually takes 1-2 business days.</p>
        </div>
    @else
        <form action="{{ route('kyc.submit') }}" method="POST" enctype="multipart/form-data" class="bg-white p-8 rounded-2xl border border-slate-200 space-y-6">
            @csrf
            
            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Document Type</label>
                <select name="document_type" required class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none">
                    <option value="passport">Passport</option>
                    <option value="id_card">National ID Card</option>
                    <option value="driving_license">Driving License</option>
                    <option value="company_registration">Company Registration Certificate</option>
                </select>
                @error('document_type') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Upload Document</label>
                <input type="file" name="document_file" required accept=".pdf,.jpg,.jpeg,.png" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none">
                <p class="text-xs text-slate-400 mt-1">Accepted formats: PDF, JPG, PNG. Max size: 10MB.</p>
                @error('document_file') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-2">Selfie / Face Verification (Optional)</label>
                <input type="file" name="face_image" accept=".jpg,.jpeg,.png" class="w-full p-3 rounded-xl border border-slate-200 focus:ring-2 focus:ring-blue-500 outline-none">
                <p class="text-xs text-slate-400 mt-1">Upload a clear selfie holding your ID document for faster verification.</p>
                @error('face_image') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white font-bold rounded-xl py-4 hover:bg-blue-700 transition">
                Submit Documents
            </button>
        </form>
    @endif
</div>
@endsection
