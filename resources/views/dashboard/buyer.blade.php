@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h1 class="text-3xl font-black text-slate-900">Buyer Workspace</h1>
        <p class="text-slate-500 mt-2">Manage your active bids and confidential data rooms.</p>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- Main -->
        <div class="lg:col-span-2 space-y-8">
            <div class="bg-white p-8 rounded-2xl border border-slate-200">
                <h2 class="text-xl font-bold mb-6 flex items-center font-mono">
                    <span class="h-2 w-2 bg-blue-600 rounded-full mr-2"></span> DATA ROOMS ACCESS
                </h2>
                <div class="space-y-4">
                    @forelse($ndas as $nda)
                    <div class="flex items-center justify-between p-4 bg-slate-50 rounded-xl border border-slate-100">
                        <div class="flex items-center">
                            <div class="h-10 w-10 bg-white rounded-lg flex items-center justify-center border border-slate-200 mr-4">
                                <i class="fa fa-folder-open text-blue-500"></i>
                            </div>
                            <div>
                                <p class="font-bold text-slate-900">{{ $nda->deal->title }}</p>
                                <p class="text-[10px] uppercase text-slate-400 font-bold tracking-widest">Signed at: {{ $nda->signed_at->format('d/m/Y') }}</p>
                            </div>
                        </div>
                        <a href="/deals/{{ $nda->deal->id }}" class="bg-white px-4 py-1.5 rounded-lg border border-slate-200 text-xs font-bold text-slate-600 hover:bg-slate-50 transition">Enter VDR</a>
                    </div>
                    @empty
                    <p class="text-slate-400 text-sm italic">You haven't requested any confidential data rooms yet.</p>
                    @endforelse
                </div>
            </div>

            <div class="bg-white p-8 rounded-2xl border border-slate-200">
                <h2 class="text-xl font-bold mb-6 flex items-center font-mono">
                    <span class="h-2 w-2 bg-emerald-600 rounded-full mr-2"></span> ACTIVE OFFERS
                </h2>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-sm">
                        <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black">
                            <tr>
                                <th class="px-4 py-3">Project</th>
                                <th class="px-4 py-3">Amount</th>
                                <th class="px-4 py-3">Status</th>
                                <th class="px-4 py-3">Expires</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            @forelse($offers as $offer)
                            <tr>
                                <td class="px-4 py-4 font-bold text-slate-900">{{ $offer->deal->title }}</td>
                                <td class="px-4 py-4 font-black">${{ number_format($offer->amount) }}</td>
                                <td class="px-4 py-4">
                                    <span class="bg-orange-50 text-orange-600 px-2 py-0.5 rounded text-[10px] font-bold uppercase tracking-wider border border-orange-100">{{ $offer->status }}</span>
                                </td>
                                <td class="px-4 py-4 text-slate-400 font-mono">{{ $offer->expires_at->format('d/m/Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="4" class="px-4 py-8 text-center text-slate-400 italic">No offers sent yet.</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Sidebar -->
        <div class="space-y-6">
            <div class="bg-slate-900 text-white p-8 rounded-2xl">
                <h3 class="font-bold text-lg mb-4">Ready to Acquire?</h3>
                <p class="text-slate-400 text-sm mb-6 leading-relaxed">Our AI-powered matching engine suggests deals based on your acquisition criteria.</p>
                @if($suggestedDeal)
                <div class="p-4 bg-slate-800 rounded-xl mb-4 border border-slate-700">
                    <p class="text-[10px] text-blue-400 uppercase font-black mb-1">AI Suggestion</p>
                    <p class="font-bold text-sm">{{ $suggestedDeal->title }}</p>
                    <p class="text-xs text-slate-500 mt-1">EBITDA: ${{ number_format($suggestedDeal->ebitda) }} • {{ $suggestedDeal->location ?? 'Global' }}</p>
                </div>
                <a href="/deals/{{ $suggestedDeal->id }}" class="block w-full bg-blue-600 text-center py-3 rounded-xl font-bold text-sm hover:bg-blue-700 transition">View Suggested Deal</a>
                @else
                <div class="p-4 bg-slate-800 rounded-xl mb-4 border border-slate-700 text-center">
                    <p class="text-slate-400 text-sm italic">No deals matching your criteria right now.</p>
                </div>
                <a href="/" class="block w-full bg-blue-600 text-center py-3 rounded-xl font-bold text-sm hover:bg-blue-700 transition">Search Marketplace</a>
                @endif
            </div>

            <div class="bg-white p-6 rounded-2xl border border-slate-200">
                <h3 class="font-bold text-slate-900 mb-4 flex items-center"><i class="fa fa-bookmark text-blue-500 mr-2"></i> Saved Deals</h3>
                <div class="space-y-4">
                    @forelse($bookmarkedDeals as $deal)
                    <div class="p-3 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-between">
                        <div>
                            <p class="font-bold text-sm">{{ $deal->title }}</p>
                            <p class="text-[10px] text-slate-400 uppercase font-bold">{{ $deal->company->industry }}</p>
                        </div>
                        <a href="/deals/{{ $deal->id }}" class="text-blue-500 hover:text-blue-600"><i class="fa fa-arrow-right"></i></a>
                    </div>
                    @empty
                    <p class="text-slate-400 text-sm italic text-center py-4">No deals saved yet.</p>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
