@extends('layouts.app')

@section('content')
<div class="max-w-3xl mx-auto space-y-8">
    <div>
        <h1 class="text-3xl font-black text-slate-900">List Your Business</h1>
        <p class="text-slate-500 mt-2">Provide accurate details to attract the right investors.</p>
    </div>

    <form action="/listings" method="POST" class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 space-y-6">
        @csrf

        <div class="space-y-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">Company Information</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Company Name</label>
                    <input type="text" name="company_name" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Industry</label>
                    <select name="industry" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        <option value="SaaS & Software">SaaS & Software</option>
                        <option value="E-commerce">E-commerce</option>
                        <option value="Manufacturing">Manufacturing</option>
                        <option value="Healthcare">Healthcare</option>
                        <option value="Retail">Retail</option>
                    </select>
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Location</label>
                <input type="text" name="location" required placeholder="City, Country" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Company Description & Teaser</label>
                <textarea name="description" rows="4" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none"></textarea>
            </div>
        </div>

        <div class="space-y-4 pt-4">
            <h2 class="text-xl font-bold text-slate-900 border-b border-slate-100 pb-2">Deal Specifications</h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Project Title</label>
                    <input type="text" name="deal_title" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Deal Type</label>
                    <select name="deal_type" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white">
                        <option value="sale_100">100% Acquisition</option>
                        <option value="partial_sale">Partial Sale</option>
                        <option value="fundraising">Fundraising</option>
                    </select>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Asking Price ($)</label>
                    <input type="number" name="asking_price" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">Annual Revenue ($)</label>
                    <input type="number" name="revenue_annual" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
                <div>
                    <label class="block text-sm font-bold text-slate-700 mb-1">EBITDA ($)</label>
                    <input type="number" name="ebitda" min="0" required class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
                </div>
            </div>

            <div>
                <label class="block text-sm font-bold text-slate-700 mb-1">Net Profit ($)</label>
                <input type="number" name="net_profit" min="0" class="w-full px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none">
            </div>

            <div class="flex items-center gap-2 pt-2">
                <input type="checkbox" name="is_confidential" value="1" id="confidential" class="w-4 h-4 text-blue-600 rounded border-slate-300">
                <label for="confidential" class="text-sm text-slate-700">Keep this listing confidential (Hide company name until NDA is signed)</label>
            </div>
        </div>

        <div class="pt-6">
            <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-700 transition">
                Submit Listing for Review
            </button>
        </div>
    </form>
</div>
@endsection
