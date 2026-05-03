@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h1 class="text-3xl font-black text-slate-900">Admin Control Center</h1>
        <p class="text-slate-500 mt-2">Oversee all marketplace activity, verify users, and approve deals.</p>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Total Users</p>
            <p class="text-3xl font-black mt-2">1,280</p>
            <p class="text-xs text-emerald-500 font-bold mt-1">+12% this month</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Active Deals</p>
            <p class="text-3xl font-black mt-2">84</p>
            <p class="text-xs text-slate-400 font-bold mt-1">$450M Total Vol.</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">Pending KYC</p>
            <p class="text-3xl font-black mt-2 text-orange-600">15</p>
            <p class="text-xs text-slate-400 font-bold mt-1">Require Action</p>
        </div>
        <div class="bg-white p-6 rounded-2xl border border-slate-200">
            <p class="text-[10px] text-slate-400 uppercase font-black tracking-widest">NDAs Signed</p>
            <p class="text-3xl font-black mt-2">342</p>
            <p class="text-xs text-slate-400 font-bold mt-1">System wide</p>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
        <div class="bg-white p-8 rounded-2xl border border-slate-200">
            <h2 class="text-xl font-bold mb-6 font-mono text-slate-900">PENDING APPROVALS</h2>
            <div class="space-y-4">
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="font-bold text-sm">FinTech SaaS Platform</p>
                        <p class="text-xs text-slate-400">Seller: John Doe • $4.5M</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-emerald-600 text-white px-3 py-1 rounded text-[10px] font-bold">APPROVE</button>
                        <button class="bg-white border border-slate-200 text-slate-400 px-3 py-1 rounded text-[10px] font-bold">REJECT</button>
                    </div>
                </div>
                <div class="p-4 bg-slate-50 rounded-xl border border-slate-100 flex items-center justify-between">
                    <div>
                        <p class="font-bold text-sm">Solar Farm Project</p>
                        <p class="text-xs text-slate-400">Seller: Jane Smith • $12M</p>
                    </div>
                    <div class="flex gap-2">
                        <button class="bg-emerald-600 text-white px-3 py-1 rounded text-[10px] font-bold">APPROVE</button>
                        <button class="bg-white border border-slate-200 text-slate-400 px-3 py-1 rounded text-[10px] font-bold">REJECT</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-slate-900 p-8 rounded-2xl text-white">
            <h2 class="text-xl font-bold mb-6 font-mono">SYSTEM ANALYTICS</h2>
            <div class="space-y-6">
                <!-- Mini Chart Scaffolding (using Tailind) -->
                <div>
                    <p class="text-xs text-slate-400 mb-2 font-bold uppercase">Marketplace Liquidity</p>
                    <div class="flex items-end gap-1 h-32">
                        <div class="bg-blue-600 w-full h-[60%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[40%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[80%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[95%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[70%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[50%] rounded-t-md"></div>
                        <div class="bg-blue-600 w-full h-[85%] rounded-t-md"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
