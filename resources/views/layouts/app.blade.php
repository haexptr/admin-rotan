<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin Rotan') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex">
        <!-- Sidebar - PERBAIKAN: width lebih kecil -->
        <aside class="w-56 bg-white shadow-sm border-r border-gray-200">
            <div class="p-4">
                <!-- Logo Section - PERBAIKAN: lebih compact -->
                <div class="flex items-center space-x-2 mb-6">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center">
                        <span class="text-white font-bold text-sm">AR</span>
                    </div>
                    <div>
                        <h2 class="text-sm font-semibold text-gray-900">Admin Rotan</h2>
                        <p class="text-xs text-gray-500">Management System</p>
                    </div>
                </div>

                <!-- Navigation Menu - PERBAIKAN: spacing lebih kecil -->
                <nav class="space-y-1">
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors
                              {{ request()->routeIs('dashboard') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('karyawans.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors
                              {{ request()->routeIs('karyawans.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        <span>Karyawan</span>
                    </a>

                    <a href="{{ route('timbangans.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors
                              {{ request()->routeIs('timbangans.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span>Timbangan</span>
                    </a>

                    <a href="{{ route('absensis.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors
                              {{ request()->routeIs('absensis.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        <span>Absensi</span>
                    </a>

                    <a href="{{ route('gajis.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors
                              {{ request()->routeIs('gajis.*') ? 'bg-blue-50 text-blue-700 border-r-2 border-blue-700' : 'text-gray-600 hover:bg-gray-50 hover:text-gray-900' }}">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                        <span>Gaji</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navigation - PERBAIKAN: lebih compact -->
            <header class="bg-white shadow-sm border-b border-gray-200 px-4 py-3">
                <div class="flex items-center justify-between">
                    <h1 class="text-lg font-semibold text-gray-900">
                        @yield('title', 'Dashboard')
                    </h1>
                    
                    <!-- User Menu - PERBAIKAN: lebih kecil -->
                    <div class="flex items-center space-x-3 text-sm">
                        <span class="text-gray-700">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline">
                            @csrf
                            <button type="submit" class="text-gray-500 hover:text-gray-700">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content - PERBAIKAN: padding lebih kecil -->
            <main class="flex-1 p-4 max-w-7xl mx-auto w-full">
                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="mb-4 bg-green-50 border border-green-200 text-green-700 px-3 py-2 rounded-md text-sm">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-50 border border-red-200 text-red-700 px-3 py-2 rounded-md text-sm">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
</body>
</html>