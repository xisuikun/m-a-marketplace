@extends('layouts.app')

@section('content')
<div class="h-[80vh] flex flex-col bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
    <!-- Chat Header -->
    <div class="p-6 border-b border-slate-100 bg-slate-50 flex justify-between items-center">
        <div class="flex items-center">
            <a href="/deals/{{ $deal->id }}" class="mr-4 text-slate-400 hover:text-slate-600"><i class="fa fa-arrow-left"></i></a>
            <div>
                <h2 class="font-bold text-slate-900">{{ $deal->title }}</h2>
                <p class="text-[10px] uppercase font-bold text-slate-400 tracking-widest">Negotiation Room</p>
            </div>
        </div>
        <div class="flex gap-2">
            <button class="bg-white border border-slate-200 text-slate-600 px-3 py-1 rounded-lg text-xs font-bold shadow-sm">Request Call</button>
            <button class="bg-emerald-600 text-white px-3 py-1 rounded-lg text-xs font-bold shadow-sm">Submit LOI</button>
        </div>
    </div>

    <!-- Chat Messages -->
    <div class="flex-1 overflow-y-auto p-6 space-y-6 bg-slate-50/50">
        @forelse($messages as $message)
            <div class="flex {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                <div class="max-w-[70%]">
                    <div class="flex items-center mb-1 {{ $message->sender_id === Auth::id() ? 'justify-end' : 'justify-start' }}">
                        <span class="text-[10px] font-bold text-slate-400 uppercase tracking-tighter">{{ $message->sender->name }}</span>
                        <span class="text-[9px] text-slate-300 ml-2">{{ $message->created_at->format('H:i') }}</span>
                    </div>
                    <div class="p-4 rounded-2xl text-sm shadow-sm {{ $message->sender_id === Auth::id() ? 'bg-blue-600 text-white rounded-tr-none' : 'bg-white text-slate-700 border border-slate-100 rounded-tl-none' }}">
                        {{ $message->content }}
                    </div>
                </div>
            </div>
        @empty
            <div class="h-full flex flex-col items-center justify-center text-slate-400">
                <i class="fa fa-comments text-4xl mb-4 text-slate-200"></i>
                <p class="text-sm italic">Start the negotiation by sending a message.</p>
            </div>
        @endforelse
    </div>

    <!-- Chat Input -->
    <div class="p-6 border-t border-slate-100">
        <form action="/deals/{{ $deal->id }}/messages" method="POST" class="flex gap-4">
            @csrf
            <div class="flex-1">
                <input name="content" type="text" placeholder="Type your message or term proposal..." class="w-full bg-slate-100 border-none rounded-xl p-4 text-sm focus:ring-2 focus:ring-blue-500 outline-none transition" required>
            </div>
            <button type="submit" class="bg-blue-600 text-white px-6 rounded-xl font-bold hover:bg-blue-700 transition">
                <i class="fa fa-paper-plane mr-2"></i> Send
            </button>
        </form>
    </div>
</div>
@endsection
