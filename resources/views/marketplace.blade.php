@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="flex justify-between items-end">
        <div>
            <h1 class="text-3xl font-bold text-slate-900">M&A Marketplace</h1>
            <p class="text-slate-500 mt-2">Discover verified companies ready for acquisition.</p>
        </div>
        <div class="flex space-x-2">
            <input type="text" placeholder="Search industries..." class="px-4 py-2 border border-slate-200 rounded-lg focus:ring-2 focus:ring-blue-500 outline-none">
            <button class="bg-slate-900 text-white px-4 py-2 rounded-lg"><i class="fa fa-filter mr-2"></i>Filter</button>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Deal Card 1 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <span class="bg-blue-50 text-blue-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">SaaS & Software</span>
                    <span class="text-slate-400"><i class="fa fa-shield-halved"></i> Verified</span>
                </div>
                <h3 class="mt-4 text-xl font-bold text-slate-900">Project CloudNative</h3>
                <p class="mt-2 text-slate-600 line-clamp-2">A rapidly growing Kubernetes-native monitoring platform with $1.2M ARR and 35% EBITDA margin.</p>
                
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold">Revenue</p>
                        <p class="text-lg font-bold text-slate-900">$1,200,000</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold">EBITDA</p>
                        <p class="text-lg font-bold text-slate-900">$420,000</p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400">Asking Price</p>
                        <p class="text-xl font-extrabold text-blue-600">$4,500,000</p>
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700">View Details</button>
                </div>
            </div>
        </div>

        <!-- Deal Card 2 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <span class="bg-emerald-50 text-emerald-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">E-commerce</span>
                    <span class="text-slate-400"><i class="fa fa-lock"></i> Confidential</span>
                </div>
                <h3 class="mt-4 text-xl font-bold text-slate-900">Direct-to-Consumer Brand</h3>
                <p class="mt-2 text-slate-600 line-clamp-2">Leading sustainable lifestyle brand in the EU market. Highly loyal customer base with primary sales via Shopify.</p>
                
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold">Revenue</p>
                        <p class="text-lg font-bold text-slate-900">$3,500,000</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold">EBITDA</p>
                        <p class="text-lg font-bold text-slate-900">$850,000</p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400">Asking Price</p>
                        <p class="text-xl font-extrabold text-blue-600">$5,800,000</p>
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700">View Details</button>
                </div>
            </div>
        </div>

        <!-- Deal Card 3 -->
        <div class="bg-white rounded-xl shadow-sm border border-slate-200 overflow-hidden hover:shadow-md transition">
            <div class="p-6">
                <div class="flex justify-between items-start">
                    <span class="bg-amber-50 text-amber-700 text-xs font-bold px-2.5 py-1 rounded-full uppercase tracking-wider">Manufacturing</span>
                    <span class="text-slate-400"><i class="fa fa-shield-halved"></i> Verified</span>
                </div>
                <h3 class="mt-4 text-xl font-bold text-slate-900">Precision Engineering Inc</h3>
                <p class="mt-2 text-slate-600 line-clamp-2">Highly specialized CNC manufacturing facility serving aerospace and medical sectors since 2012.</p>
                
                <div class="mt-6 grid grid-cols-2 gap-4">
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold">Revenue</p>
                        <p class="text-lg font-bold text-slate-900">$2,100,000</p>
                    </div>
                    <div>
                        <p class="text-xs text-slate-400 uppercase font-semibold">EBITDA</p>
                        <p class="text-lg font-bold text-slate-900">$510,000</p>
                    </div>
                </div>

                <div class="mt-6 pt-6 border-t border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="text-xs text-slate-400">Asking Price</p>
                        <p class="text-xl font-extrabold text-blue-600">$2,950,000</p>
                    </div>
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg font-bold hover:bg-blue-700">View Details</button>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
