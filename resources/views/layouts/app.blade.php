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
    
    <!-- Prevent Drag/Select Issues -->
    <style>
        * {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            -webkit-user-drag: none;
            -webkit-touch-callout: none;
            -webkit-tap-highlight-color: transparent;
        }
        
        /* Allow text selection only where needed */
        input, textarea, [contenteditable] {
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex" x-data="darkMode">
        <!-- Sidebar -->
        <aside class="w-56 bg-white dark:bg-gray-800 shadow-sm border-r border-gray-200 dark:border-gray-700 select-none">
            <div class="p-4">
                <!-- Logo Section -->
                <div class="flex items-center space-x-2 mb-6 select-none">
                    <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center select-none">
                        <span class="text-white font-bold text-sm select-none">AR</span>
                    </div>
                    <div class="select-none">
                        <h2 class="text-sm font-semibold text-gray-900 dark:text-white select-none">Admin Rotan</h2>
                        <p class="text-xs text-gray-500 dark:text-gray-400 select-none">Management System</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="space-y-1 select-none">
                    <a href="{{ route('dashboard') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors select-none
                              {{ request()->routeIs('dashboard') 
                                 ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300 border-r-2 border-blue-700' 
                                 : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        <span class="select-none">Dashboard</span>
                    </a>

                    <a href="{{ route('karyawans.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors select-none
                              {{ request()->routeIs('karyawans.*') 
                                 ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300 border-r-2 border-blue-700' 
                                 : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        <span class="select-none">Karyawan</span>
                    </a>

                    <a href="{{ route('timbangans.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors select-none
                              {{ request()->routeIs('timbangans.*') 
                                 ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300 border-r-2 border-blue-700' 
                                 : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="select-none">Timbangan</span>
                    </a>

                    <a href="{{ route('absensis.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors select-none
                              {{ request()->routeIs('absensis.*') 
                                 ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300 border-r-2 border-blue-700' 
                                 : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        <span class="select-none">Absensi</span>
                    </a>

                    <a href="{{ route('gajis.index') }}" 
                       class="flex items-center space-x-2 px-3 py-2 rounded-md text-sm font-medium transition-colors select-none
                              {{ request()->routeIs('gajis.*') 
                                 ? 'bg-blue-50 dark:bg-blue-900 text-blue-700 dark:text-blue-300 border-r-2 border-blue-700' 
                                 : 'text-gray-600 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 hover:text-gray-900 dark:hover:text-white' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span class="select-none">Gaji</span>
                    </a>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Top Navigation - NO DRAG -->
            <header class="bg-white dark:bg-gray-800 shadow-sm border-b border-gray-200 dark:border-gray-700 px-4 py-3 select-none">
                <div class="flex items-center justify-between select-none">
                    <!-- Dynamic Title berdasarkan Route -->
                    <h1 class="text-lg font-semibold text-gray-900 dark:text-white select-none pointer-events-none">
                        @if(request()->routeIs('dashboard'))
                            Dashboard
                        @elseif(request()->routeIs('karyawans.*'))
                            Karyawan
                        @elseif(request()->routeIs('absensis.*'))
                            Absensi  
                        @elseif(request()->routeIs('timbangans.*'))
                            Timbangan
                        @elseif(request()->routeIs('gajis.*'))
                            Gaji
                        @else
                            {{ ucfirst(str_replace(['.', '_'], [' ', ' '], Route::currentRouteName() ?? 'Dashboard')) }}
                        @endif
                    </h1>
                    
                    <!-- User Menu with Dark Mode Toggle -->
                    <div class="flex items-center space-x-4 text-sm select-none">
                        <!-- Dark Mode Toggle - NO DRAG -->
                        <div class="flex items-center space-x-2 select-none">
                            <button @click="toggle()" 
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 select-none shrink-0"
                                    :class="{ 'bg-blue-600': isDark, 'bg-gray-200': !isDark }"
                                    type="button"
                                    aria-label="Toggle dark mode"
                                    draggable="false">
                                <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 ease-in-out pointer-events-none select-none shadow-sm"
                                      :class="{ 'translate-x-6': isDark, 'translate-x-1': !isDark }"
                                      draggable="false">
                                </span>
                            </button>
                            <span class="text-sm text-gray-600 dark:text-gray-400 select-none pointer-events-none" 
                                  x-text="isDark ? 'Dark' : 'Light'"></span>
                        </div>
                        
                        <!-- User Info -->
                        <span class="text-gray-700 dark:text-gray-300 select-none pointer-events-none">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline select-none">
                            @csrf
                            <button type="submit" class="text-gray-500 dark:text-gray-400 hover:text-gray-700 dark:hover:text-gray-200 transition-colors select-none">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 max-w-7xl mx-auto w-full">
                <!-- Success/Error Messages -->
                @if (session('success'))
                    <div class="mb-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-300 px-3 py-2 rounded-md text-sm select-none">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="mb-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-300 px-3 py-2 rounded-md text-sm select-none">
                        {{ session('error') }}
                    </div>
                @endif

                {{ $slot }}
            </main>
        </div>
    </div>
    
    @stack('scripts')
</body>
</html>