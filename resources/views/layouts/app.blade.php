<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? 'M&A Marketplace' }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-50 font-sans text-slate-900">
    <!-- Sidebar / Navigation -->
    <nav class="bg-white border-b border-slate-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="flex-shrink-0 flex items-center">
                        <span class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-blue-600 to-indigo-600">
                            MNAPlatform
                        </span>
                    </div>
                    <div class="hidden sm:ml-6 sm:flex sm:space-x-8">
                        <a href="/" class="{{ request()->is('/') ? 'border-blue-500 text-slate-900' : 'border-transparent text-slate-500' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Marketplace</a>
                        @auth
                            <a href="/dashboard" class="{{ request()->is('dashboard*') ? 'border-blue-500 text-slate-900' : 'border-transparent text-slate-500' }} inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Dashboard</a>
                        @endauth
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    @guest
                        <a href="/login" class="text-slate-500 hover:text-slate-700 text-sm font-medium">Sign in</a>
                        <a href="/register" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">Register</a>
                    @else
                        <div class="flex items-center space-x-3">
                            <span class="text-sm text-slate-600 font-medium">{{ Auth::user()->name }}</span>
                            <form action="/logout" method="POST">
                                @csrf
                                <button type="submit" class="text-slate-400 hover:text-red-500 transition"><i class="fa fa-sign-out"></i></button>
                            </form>
                        </div>
                    @endguest
                </div>
            </div>
        </div>
    </nav>

    @if(session('success'))
        <div class="max-w-7xl mx-auto px-4 mt-4 sm:px-6 lg:px-8">
            <div class="bg-emerald-50 border border-emerald-200 text-emerald-800 px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                <span class="text-sm font-medium"><i class="fa fa-check-circle mr-2"></i> {{ session('success') }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="text-emerald-400 hover:text-emerald-600 transition">✕</button>
            </div>
        </div>
    @endif

    @if(session('error') || $errors->any())
        <div class="max-w-7xl mx-auto px-4 mt-4 sm:px-6 lg:px-8">
            <div class="bg-red-50 border border-red-200 text-red-800 px-4 py-3 rounded-xl flex items-center justify-between shadow-sm">
                <span class="text-sm font-medium"><i class="fa fa-exclamation-circle mr-2"></i> {{ session('error') ?? $errors->first() }}</span>
                <button onclick="this.parentElement.parentElement.remove()" class="text-red-400 hover:text-red-600 transition">✕</button>
            </div>
        </div>
    @endif

    <main class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:px-8">
        @yield('content')
    </main>

    <footer class="bg-white border-t border-slate-200 mt-12 py-8">
        <div class="max-w-7xl mx-auto px-4 text-center text-slate-500 text-sm">
            &copy; 2026 M&A Marketplace Platform. Built with Laravel 12.
        </div>
    </footer>
</body>
</html>