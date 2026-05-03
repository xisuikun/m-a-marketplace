@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <!-- Header -->
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <div class="flex justify-between items-start">
            <div>
                <span class="bg-blue-100 text-blue-700 text-xs font-bold px-3 py-1 rounded-full uppercase tracking-widest">{{ $deal->company->industry }}</span>
                <h1 class="text-4xl font-black text-slate-900 mt-4">{{ $deal->is_confidential && !$canViewPrivate ? 'Project ' . strtoupper(substr($deal->title, 0, 4)) : $deal->title }}</h1>
                <p class="text-slate-500 mt-2 flex items-center"><i class="fa fa-location-dot mr-2"></i> {{ $deal->location ?? 'Global / Remote' }}</p>
            </div>
            <div class="text-right">
                <p class="text-sm text-slate-400 uppercase font-bold tracking-tighter">Asking Price</p>
                <p class="text-4xl font-black text-blue-600">${{ number_format($deal->asking_price) }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main Content -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-2xl border border-slate-200">
                <h2 class="text-xl font-bold mb-4">Executive Summary</h2>
                <p class="text-slate-600 leading-relaxed">{{ $deal->teaser }}</p>
            </div>

            <!-- Financial Snapshot -->
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <p class="text-xs font-bold text-slate-400 uppercase">Revenue</p>
                    <p class="text-xl font-black">${{ number_format($deal->revenue_annual) }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <p class="text-xs font-bold text-slate-400 uppercase">EBITDA</p>
                    <p class="text-xl font-black">${{ number_format($deal->ebitda) }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <p class="text-xs font-bold text-slate-400 uppercase">Net Profit</p>
                    <p class="text-xl font-black">${{ number_format($deal->net_profit ?? 0) }}</p>
                </div>
                <div class="bg-white p-6 rounded-2xl border border-slate-200">
                    <p class="text-xs font-bold text-slate-400 uppercase">Growth</p>
                    <p class="text-xl font-black text-emerald-600">+{{ $deal->growth_percentage ?? 0 }}%</p>
                </div>
            </div>

            <!-- Private Section (NDA Required) -->
            @if($canViewPrivate)
                <div class="bg-emerald-50 border border-emerald-200 p-8 rounded-2xl">
                    <div class="flex items-center mb-6">
                        <div class="h-10 w-10 bg-emerald-600 rounded-full flex items-center justify-center text-white mr-4">
                            <i class="fa fa-unlock"></i>
                        </div>
                        <h2 class="text-xl font-bold text-emerald-900">Virtual Data Room (VDR)</h2>
                    </div>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <div class="bg-white p-4 rounded-xl border border-emerald-100 flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fa fa-file-pdf text-red-500 text-2xl mr-3"></i>
                                <div>
                                    <p class="font-bold text-sm">Full Financial Audit 2025.pdf</p>
                                    <p class="text-[10px] text-slate-400">12.5 MB • PDF</p>
                                </div>
                            </div>
                            <button class="text-slate-400 hover:text-emerald-600"><i class="fa fa-download"></i></button>
                        </div>
                        <div class="bg-white p-4 rounded-xl border border-emerald-100 flex items-center justify-between">
                            <div class="flex items-center">
                                <i class="fa fa-file-word text-blue-500 text-2xl mr-3"></i>
                                <div>
                                    <p class="font-bold text-sm">Employee Contracts.docx</p>
                                    <p class="text-[10px] text-slate-400">2.1 MB • DOCX</p>
                                </div>
                            </div>
                            <button class="text-slate-400 hover:text-emerald-600"><i class="fa fa-download"></i></button>
                        </div>
                    </div>

                    <div class="mt-8">
                        <h3 class="font-bold text-sm mb-4 uppercase tracking-widest text-emerald-700">Submit an Offer</h3>
                        <form action="/deals/{{ $deal->id }}/offers" method="POST" class="space-y-4">
                            @csrf
                            <div class="grid grid-cols-2 gap-4">
                                <input type="number" name="amount" placeholder="Offer Price ($)" required class="bg-white p-3 rounded-xl border border-emerald-200 outline-none w-full">
                                <button type="submit" class="bg-emerald-600 text-white font-bold rounded-xl px-6 hover:bg-emerald-700 transition">Send Official LOI</button>
                            </div>
                            <textarea name="terms" placeholder="Terms and conditions..." class="bg-white p-3 rounded-xl border border-emerald-200 outline-none w-full text-sm" rows="2"></textarea>
                        </form>
                    </div>
                </div>
            @else
                <div class="bg-slate-900 p-12 rounded-2xl text-center">
                    <div class="h-16 w-16 bg-slate-800 rounded-full flex items-center justify-center text-blue-500 mx-auto mb-6">
                        <i class="fa fa-lock text-3xl"></i>
                    </div>
                    <h2 class="text-2xl font-bold text-white uppercase tracking-wider">Confidential Data Room</h2>
                    <p class="text-slate-400 mt-2 max-w-sm mx-auto">Access to full financials, legal documents, and IP requires a signed Non-Disclosure Agreement.</p>
                    
                    @auth
                        <form action="/deals/{{ $deal->id }}/nda" method="POST" class="mt-8">
                            @csrf
                            <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold transition flex items-center mx-auto">
                                <i class="fa fa-file-signature mr-2"></i> Sign NDA & Access Data Room
                            </button>
                        </form>
                    @else
                        <a href="/login" class="inline-block mt-8 bg-slate-800 text-white px-8 py-3 rounded-xl font-bold">Login to Sign NDA</a>
                    @endauth
                </div>
            @endif
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200">
                <h3 class="font-bold text-slate-900 mb-4 uppercase tracking-widest text-xs">Ownership Structure</h3>
                <div class="space-y-4">
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500">Founder(s)</span>
                        <div class="flex items-center">
                            <div class="w-24 h-2 bg-slate-100 rounded-full mr-2 overflow-hidden">
                                <div class="bg-blue-600 h-full w-[65%]"></div>
                            </div>
                            <span class="font-bold">65%</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500">Angel Investors</span>
                        <div class="flex items-center">
                            <div class="w-24 h-2 bg-slate-100 rounded-full mr-2 overflow-hidden">
                                <div class="bg-blue-600 h-full w-[25%]"></div>
                            </div>
                            <span class="font-bold">25%</span>
                        </div>
                    </div>
                    <div class="flex justify-between items-center text-sm">
                        <span class="text-slate-500">ESOP</span>
                        <div class="flex items-center">
                            <div class="w-24 h-2 bg-slate-100 rounded-full mr-2 overflow-hidden">
                                <div class="bg-blue-600 h-full w-[10%]"></div>
                            </div>
                            <span class="font-bold">10%</span>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-blue-600 p-6 rounded-2xl text-white">
                <h3 class="font-bold mb-2">Need Help?</h3>
                <p class="text-blue-100 text-sm mb-4">Our M&A advisors can help you evaluate this deal and prepare an offer.</p>
                <button class="w-full bg-white text-blue-600 py-2 rounded-xl font-bold text-sm">Talk to Advisor</button>
            </div>
        </div>
    </div>
</div>
@endsection