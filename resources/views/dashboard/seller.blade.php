@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200 flex justify-between items-center">
        <div>
            <h1 class="text-3xl font-black text-slate-900">Seller Dashboard</h1>
            <p class="text-slate-500 mt-2">Manage your business listings and track investor interest.</p>
        </div>
        <a href="/listings/create" class="bg-blue-600 text-white px-6 py-3 rounded-xl font-bold hover:bg-blue-700 transition inline-flex items-center">
            <i class="fa fa-plus mr-2"></i> List New Business
        </a>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
        <!-- My Businesses -->
        <div class="lg:col-span-2 space-y-6">
            <h2 class="text-xl font-bold uppercase tracking-widest text-slate-400 text-xs">Your Listings</h2>
            
            @forelse($companies as $company)
                @foreach($company->deals as $deal)
                <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
                    <div class="p-6 flex flex-col md:flex-row md:items-center justify-between gap-6">
                        <div class="flex-1">
                            <div class="flex items-center gap-2 mb-2">
                                <span class="bg-blue-50 text-blue-600 px-2 py-0.5 rounded text-[10px] font-bold uppercase">{{ $company->industry }}</span>
                                <span class="bg-slate-100 text-slate-500 px-2 py-0.5 rounded text-[10px] font-bold uppercase border border-slate-200">{{ $deal->status }}</span>
                            </div>
                            <h3 class="text-xl font-bold text-slate-900">{{ $deal->title }}</h3>
                            <p class="text-sm text-slate-500 mt-1">Listing ID: #{{ $deal->id }} • Updated {{ $deal->updated_at->diffForHumans() }}</p>
                        </div>
                        
                        <div class="flex items-center gap-8">
                            <div class="text-center">
                                <p class="text-[10px] text-slate-400 uppercase font-bold">Interests</p>
                                <p class="text-xl font-black text-slate-900">{{ $deal->ndas->count() }}</p>
                            </div>
                            <div class="text-center">
                                <p class="text-[10px] text-slate-400 uppercase font-bold">Offers</p>
                                <p class="text-xl font-black text-slate-900">{{ $deal->offers->count() }}</p>
                            </div>
                            <div class="flex gap-2">
                                <a href="/deals/{{ $deal->id }}" class="p-2 text-slate-400 hover:text-blue-600"><i class="fa fa-eye"></i></a>
                                <a href="/listings/{{ $deal->id }}/edit" class="p-2 text-slate-400 hover:text-slate-600"><i class="fa fa-edit"></i></a>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Interest List -->
                    @if($deal->ndas->count() > 0)
                    <div class="bg-slate-50 px-6 py-4 border-t border-slate-100">
                        <p class="text-[10px] font-black text-slate-400 uppercase mb-3">Recently Signed NDAs</p>
                        <div class="flex -space-x-2">
                            @foreach($deal->ndas->take(5) as $nda)
                                <div class="h-8 w-8 rounded-full bg-blue-600 border-2 border-white flex items-center justify-center text-[10px] text-white font-bold" title="{{ $nda->user->name }}">
                                    {{ strtoupper(substr($nda->user->name, 0, 2)) }}
                                </div>
                            @endforeach
                            @if($deal->ndas->count() > 5)
                                <div class="h-8 w-8 rounded-full bg-slate-200 border-2 border-white flex items-center justify-center text-[10px] text-slate-500 font-bold">
                                    +{{ $deal->ndas->count() - 5 }}
                                </div>
                            @endif
                        </div>
                    </div>
                    @endif
                </div>
                @endforeach
            @empty
                <div class="bg-white p-12 rounded-2xl border border-dashed border-slate-300 text-center">
                    <p class="text-slate-400 italic">No listings found. Start by adding your company.</p>
                </div>
            @endforelse
        </div>

        <!-- Stats Sidebar -->
        <div class="space-y-6">
            <div class="bg-white p-6 rounded-2xl border border-slate-200">
                <h3 class="font-bold text-slate-900 mb-4 uppercase tracking-widest text-xs">Selling Progress</h3>
                <div class="space-y-6">
                    <div class="relative">
                        <div class="flex justify-between text-xs font-bold mb-1">
                            <span class="text-slate-400">Profile Completion</span>
                            <span class="text-blue-600">{{ $progress }}%</span>
                        </div>
                        <div class="h-2 bg-slate-100 rounded-full overflow-hidden">
                            <div class="bg-blue-600 h-full" style="width: {{ $progress }}%"></div>
                        </div>
                    </div>
                    <div>
                        <ul class="text-xs space-y-3">
                            <li class="flex items-center {{ $isVerified ? 'text-emerald-600' : 'text-slate-400' }}">
                                <i class="fa {{ $isVerified ? 'fa-check-circle' : 'fa-circle text-[8px]' }} mr-2"></i> KYC Verified
                            </li>
                            <li class="flex items-center {{ $hasCompany ? 'text-emerald-600' : 'text-slate-400' }}">
                                <i class="fa {{ $hasCompany ? 'fa-check-circle' : 'fa-circle text-[8px]' }} mr-2"></i> Company Profile Created
                            </li>
                            <li class="flex items-center {{ $hasDeal ? 'text-emerald-600' : 'text-slate-400' }}">
                                <i class="fa {{ $hasDeal ? 'fa-check-circle' : 'fa-circle text-[8px]' }} mr-2"></i> Active Deal Listed
                            </li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="bg-indigo-600 p-8 rounded-2xl text-white">
                <h3 class="font-bold text-lg mb-2">Need Valuation?</h3>
                <p class="text-indigo-100 text-sm mb-6">Our experts can help you determine the fair market value of your business.</p>
                <button class="w-full bg-indigo-500 text-white py-3 rounded-xl font-bold text-sm border border-indigo-400 hover:bg-indigo-400 transition">Get Valuation Report</button>
            </div>
        </div>
    </div>
</div>
@endsection
