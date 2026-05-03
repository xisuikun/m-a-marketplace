@extends('layouts.app')

@section('content')
<div class="space-y-8">
    <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <h1 class="text-3xl font-black text-slate-900">KYC Verification Center</h1>
        <p class="text-slate-500 mt-2">Review and verify user identity documents.</p>
    </div>

    @if(session('success'))
        <div class="bg-emerald-50 text-emerald-700 p-4 rounded-xl border border-emerald-200 font-bold">
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl border border-slate-200 overflow-hidden">
        <table class="w-full text-left text-sm">
            <thead class="bg-slate-50 text-slate-400 uppercase text-[10px] font-black">
                <tr>
                    <th class="px-6 py-4">User</th>
                    <th class="px-6 py-4">Document Type</th>
                    <th class="px-6 py-4">Submitted At</th>
                    <th class="px-6 py-4">Status</th>
                    <th class="px-6 py-4">Actions</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-100">
                @forelse($requests as $request)
                <tr>
                    <td class="px-6 py-4">
                        <p class="font-bold text-slate-900">{{ $request->user->name }}</p>
                        <p class="text-xs text-slate-500">{{ $request->user->email }}</p>
                    </td>
                    <td class="px-6 py-4 font-mono text-slate-600">
                        {{ strtoupper($request->document_type) }}
                        <div class="flex gap-2 mt-2">
                            <a href="/storage/{{ $request->document_path }}" target="_blank" class="text-blue-500 hover:underline text-[10px]">View Doc</a>
                            @if($request->face_image_path)
                                <a href="/storage/{{ $request->face_image_path }}" target="_blank" class="text-emerald-500 hover:underline text-[10px]">View Face</a>
                            @endif
                        </div>
                    </td>
                    <td class="px-6 py-4 text-slate-500">{{ $request->created_at->format('M d, Y H:i') }}</td>
                    <td class="px-6 py-4">
                        @if($request->status === 'pending')
                            <span class="bg-orange-50 text-orange-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase">Pending</span>
                        @elseif($request->status === 'approved')
                            <span class="bg-emerald-50 text-emerald-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase">Approved</span>
                        @else
                            <span class="bg-red-50 text-red-600 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase">Rejected</span>
                        @endif
                    </td>
                    <td class="px-6 py-4">
                        @if($request->status === 'pending')
                            <div class="flex gap-2">
                                <form action="{{ route('admin.kyc.approve', $request) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-emerald-600 text-white px-3 py-1.5 rounded-lg text-[10px] font-bold hover:bg-emerald-700">Approve</button>
                                </form>
                                <form action="{{ route('admin.kyc.reject', $request) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="bg-white border border-slate-200 text-red-600 px-3 py-1.5 rounded-lg text-[10px] font-bold hover:bg-slate-50">Reject</button>
                                </form>
                            </div>
                        @else
                            <span class="text-slate-400 italic text-xs">Resolved</span>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-6 py-8 text-center text-slate-400 italic">No KYC requests found.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
