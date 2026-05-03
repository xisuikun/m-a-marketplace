@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl font-black text-slate-900">Edit Your Business Listing</h1>
        <p class="text-slate-500 mt-2">Update your business details to keep investors informed.</p>
    </div>

    <form action="/listings/{{ $deal->id }}" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 space-y-6">
        @csrf
        @method('PUT')

        <div class="space-y-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">Company Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Company Name</label>
                    <input type="text" name="company_name" value="{{ $deal->company->name }}" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Industry</label>
                    <select name="industry" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        <option value="SaaS & Software" {{ $deal->company->industry == 'SaaS & Software' ? 'selected' : '' }}>SaaS & Software</option>
                        <option value="E-commerce" {{ $deal->company->industry == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                        <option value="Manufacturing" {{ $deal->company->industry == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                        <option value="Healthcare" {{ $deal->company->industry == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
                        <option value="Retail" {{ $deal->company->industry == 'Retail' ? 'selected' : '' }}>Retail</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Location</label>
                <input type="text" name="location" value="{{ $deal->location }}" required placeholder="City, Country" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Company Description & Teaser</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">{{ $deal->company->description }}</textarea>
            </div>
        </div>

        <div class="space-y-4 pt-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">Deal Specifications</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Project Title</label>
                    <input type="text" name="deal_title" value="{{ $deal->title }}" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Deal Type</label>
                    <select name="deal_type" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        <option value="sale_100" {{ $deal->deal_type == 'sale_100' ? 'selected' : '' }}>100% Acquisition</option>
                        <option value="partial_sale" {{ $deal->deal_type == 'partial_sale' ? 'selected' : '' }}>Partial Sale</option>
                        <option value="fundraising" {{ $deal->deal_type == 'fundraising' ? 'selected' : '' }}>Fundraising</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Asking Price ($)</label>
                    <input type="number" name="asking_price" value="{{ $deal->asking_price }}" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Annual Revenue ($)</label>
                    <input type="number" name="revenue_annual" value="{{ $deal->revenue_annual }}" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">EBITDA ($)</label>
                    <input type="number" name="ebitda" value="{{ $deal->ebitda }}" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Net Profit ($)</label>
                <input type="number" name="net_profit" value="{{ $deal->net_profit }}" min="0" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_confidential" value="1" id="confidential" {{ $deal->is_confidential ? 'checked' : '' }} class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="confidential" class="text-sm text-slate-700">Keep this listing confidential (Hide company name until NDA is signed)</label>
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                Update Listing
            </button>
        </div>
    </form>
</div>
@endsection
