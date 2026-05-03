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
                        <a href="/marketplace" class="border-blue-500 text-slate-900 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Marketplace</a>
                        <a href="/deals" class="border-transparent text-slate-500 hover:border-slate-300 hover:text-slate-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">My Deals</a>
                        <a href="/offers" class="border-transparent text-slate-500 hover:border-slate-300 hover:text-slate-700 inline-flex items-center px-1 pt-1 border-b-2 text-sm font-medium">Offers</a>
                    </div>
                </div>
                <div class="flex items-center space-x-4">
                    <button class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm font-semibold hover:bg-blue-700 transition">List Your Company</button>
                    <div class="h-8 w-8 rounded-full bg-slate-200 flex items-center justify-center text-slate-600 font-bold">JD</div>
                </div>
            </div>
        </div>
    </nav>

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
