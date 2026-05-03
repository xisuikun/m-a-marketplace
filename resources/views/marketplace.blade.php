@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">M&A Marketplace</h1>
            <p class="text-slate-500 mt-2">Discover verified companies ready for acquisition.</p>
        </div>
        <form action="/" method="GET" class="flex flex-wrap items-center gap-3">
            <div class="relative flex-1 min-w-[200px]">
                <i class="fa fa-search absolute left-3 top-3 text-slate-400"></i>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Keyword..." class="w-full pl-10 pr-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none transition">
            </div>
            
            <select name="industry" class="px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none bg-white text-sm">
                <option value="">All Industries</option>
                <option value="SaaS & Software" {{ request('industry') == 'SaaS & Software' ? 'selected' : '' }}>SaaS & Software</option>
                <option value="E-commerce" {{ request('industry') == 'E-commerce' ? 'selected' : '' }}>E-commerce</option>
                <option value="Manufacturing" {{ request('industry') == 'Manufacturing' ? 'selected' : '' }}>Manufacturing</option>
                <option value="Healthcare" {{ request('industry') == 'Healthcare' ? 'selected' : '' }}>Healthcare</option>
            </select>

            <input type="text" name="location" value="{{ request('location') }}" placeholder="Location..." class="px-4 py-2 border border-slate-200 rounded-xl focus:ring-2 focus:ring-blue-500 outline-none text-sm w-40">

            <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-xl font-bold hover:bg-blue-700 transition shadow-sm">
                Apply Filters
            </button>
            
            @if(request()->anyFilled(['search', 'industry', 'location']))
                <a href="/" class="text-slate-400 hover:text-slate-600 text-xs font-bold underline">Reset</a>
            @endif
        </form>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        @foreach($deals as $deal)
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <span class="bg-blue-50 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">
                        {{ $deal->company->industry }}
                    </span>
                    @if($deal->is_confidential)
                        <span class="text-slate-400 text-xs"><i class="fa fa-lock"></i> Confidential</span>
                    @else
                        <span class="text-slate-400 text-xs"><i class="fa fa-shield-halved"></i> Verified</span>
                    @endif
                </div>
                <h3 class="mt-4 text-xl font-bold text-slate-900">{{ $deal->is_confidential ? 'Project ' . bin2hex(random_bytes(3)) : $deal->title }}</h3>
                <p class="mt-2 text-slate-600 line-clamp-2">{{ $deal->teaser }}</p>
                
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold">Revenue</p>
                        <p class="text-lg font-bold text-slate-900">${{ number_format($deal->revenue_annual) }}</p>
                    </div>
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold">EBITDA</p>
                        <p class="text-lg font-bold text-slate-900">${{ number_format($deal->ebitda) }}</p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-[10px] text-slate-400 uppercase font-semibold">Asking Price</p>
                        <p class="text-xl font-extrabold text-blue-600">${{ number_format($deal->asking_price) }}</p>
                    </div>
                    <a href="/deals/{{ $deal->id }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700 transition">View Details</a>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="mt-8">
        {{ $deals->links() }}
    </div>

</div>
@endsection