<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin Rotan') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link rel="icon" type="image/png" href="{{ asset('SA.png') }}">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
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
        
        input, textarea, [contenteditable] {
            -webkit-user-select: text;
            -moz-user-select: text;
            -ms-user-select: text;
            user-select: text;
        }

        /* Dark Mint Premium Theme */
        .sidebar-green {
            background: linear-gradient(135deg, #1e3a2e 0%, #2d5a45 100%);
            box-shadow: 0 10px 25px rgba(30, 58, 46, 0.15);
        }
        
        .header-green {
            background: linear-gradient(135deg, #1e3a2e 0%, #2d5a45 50%, #3d6b55 100%);
            box-shadow: 0 4px 15px rgba(30, 58, 46, 0.2);
        }
        
        .nav-active-green {
            background: rgba(6, 182, 212, 0.15);
            color: #06b6d4;
            border-right: 3px solid #06b6d4;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(6, 182, 212, 0.1);
        }
        
        .nav-hover-green:hover {
            background: rgba(255, 255, 255, 0.08);
            color: #cffafe;
            transform: translateX(2px);
            transition: all 0.3s ease;
        }
        
        .toggle-green {
            background: linear-gradient(135deg, #06b6d4 0%, #0891b2 100%);
            box-shadow: 0 2px 8px rgba(6, 182, 212, 0.3);
        }
        
        .toggle-green-inactive {
            background: rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }
        
        .dark .sidebar-green {
            background: linear-gradient(135deg, #0f1f1a 0%, #1e3a2e 100%);
        }
        
        .dark .header-green {
            background: linear-gradient(135deg, #0f1f1a 0%, #1e3a2e 50%, #2d5a45 100%);
        }

        .logo-container {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .nav-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-item:hover {
            box-shadow: 0 4px 12px rgba(6, 182, 212, 0.15);
        }
    </style>
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex" x-data="darkMode">
        <!-- Sidebar -->
        <aside class="w-56 sidebar-green shadow-lg border-r border-cyan-800/30 select-none">
            <div class="p-4">
                <!-- Logo Section -->
                <div class="flex items-center space-x-2 mb-6 select-none">
                    <div class="w-8 h-8 flex items-center justify-center select-none overflow-hidden logo-container rounded-lg">
                        <img src="{{ asset('SA.png') }}" 
                            alt="SA" 
                            class="w-full h-full object-cover select-none aspect-square">
                    </div>
                    <div class="select-none">
                        <h2 class="text-sm font-semibold text-white select-none">Admin</h2>
                        <p class="text-xs text-cyan-100/80 select-none">Management System</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="space-y-1 select-none">
                    <a href="{{ route('dashboard') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('dashboard') 
                                 ? 'nav-active-green' 
                                 : 'text-cyan-100/90 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 7v10a2 2 0 002 2h14a2 2 0 002-2V9a2 2 0 00-2-2H5a2 2 0 00-2-2z"></path>
                        </svg>
                        <span class="select-none">Dashboard</span>
                    </a>

                    <a href="{{ route('karyawans.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('karyawans.*') 
                                 ? 'nav-active-green' 
                                 : 'text-cyan-100/90 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                        </svg>
                        <span class="select-none">Karyawan</span>
                    </a>

                    <a href="{{ route('timbangans.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('timbangans.*') 
                                 ? 'nav-active-green' 
                                 : 'text-cyan-100/90 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                        <span class="select-none">Timbangan</span>
                    </a>

                    <a href="{{ route('absensis.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('absensis.*') 
                                 ? 'nav-active-green' 
                                 : 'text-cyan-100/90 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                        </svg>
                        <span class="select-none">Absensi</span>
                    </a>

                    <a href="{{ route('gajis.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('gajis.*') 
                                 ? 'nav-active-green' 
                                 : 'text-cyan-100/90 nav-hover-green' }}">
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
            <!-- Header -->
            <header class="header-green shadow-lg border-b border-cyan-800/30 px-4 py-3 select-none">
                <div class="flex items-center justify-between select-none">
                    <h1 class="text-lg font-semibold text-white select-none pointer-events-none">
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
                    
                    <div class="flex items-center space-x-4 text-sm select-none">
                        <div class="flex items-center space-x-2 select-none">
                            <button @click="toggle()" 
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-cyan-300 focus:ring-offset-2 focus:ring-offset-cyan-800 select-none shrink-0"
                                    :class="{ 'toggle-green': isDark, 'toggle-green-inactive': !isDark }"
                                    type="button"
                                    aria-label="Toggle dark mode"
                                    draggable="false">
                                <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 ease-in-out pointer-events-none select-none shadow-sm"
                                      :class="{ 'translate-x-6': isDark, 'translate-x-1': !isDark }"
                                      draggable="false">
                                </span>
                            </button>
                            <span class="text-sm text-cyan-100/90 select-none pointer-events-none" 
                                  x-text="isDark ? 'Dark' : 'Light'"></span>
                        </div>
                        
                        <span class="text-cyan-100/90 select-none pointer-events-none">{{ Auth::user()->name }}</span>
                        <form method="POST" action="{{ route('logout') }}" class="inline select-none">
                            @csrf
                            <button type="submit" class="text-cyan-100/80 hover:text-white transition-colors select-none">
                                Logout
                            </button>
                        </form>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 max-w-7xl mx-auto w-full">
                @if (session('success'))
                    <div class="mb-4 bg-cyan-50 dark:bg-cyan-900/20 border border-cyan-200 dark:border-cyan-800 text-cyan-700 dark:text-cyan-300 px-3 py-2 rounded-md text-sm select-none">
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