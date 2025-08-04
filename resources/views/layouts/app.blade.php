<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Admin Rotan') }}</title>
    
    <!-- CRITICAL: Dark Mode Pre-loader Script (BEFORE any CSS) -->
    <script>
        (function() {
            const savedTheme = localStorage.getItem('theme');
            const systemPrefersDark = window.matchMedia('(prefers-color-scheme: dark)').matches;
            const isDark = savedTheme === 'dark' || (!savedTheme && systemPrefersDark);
            
            if (isDark) {
                document.documentElement.classList.add('dark');
            } else {
                document.documentElement.classList.remove('dark');
            }
        })();
    </script>
    
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

        /* New Color Palette Theme */
        .sidebar-green {
            background: #242424;
            box-shadow: 0 10px 25px rgba(36, 36, 36, 0.15);
        }
        
        .header-green {
            background: #242424;
            box-shadow: 0 4px 15px rgba(36, 36, 36, 0.2);
        }
        
        .nav-active-green {
            background: #fafafa;
            color: #242424;
            border-right: 3px solid #fafafa;
            backdrop-filter: blur(10px);
            box-shadow: 0 2px 10px rgba(250, 250, 250, 0.1);
        }
        
        .nav-hover-green:hover {
            background: rgba(109, 109, 109, 0.15);
            color: #e7e7e7;
            transform: translateX(2px);
            transition: all 0.3s ease;
        }
        
        .toggle-green {
            background: #6d6d6d;
            box-shadow: 0 2px 8px rgba(109, 109, 109, 0.3);
        }
        
        .toggle-green-inactive {
            background: #e7e7e7;
            backdrop-filter: blur(10px);
        }
        
        .dark .sidebar-green {
            background: #1a1a1a;
        }
        
        .dark .header-green {
            background: #1a1a1a;
        }

        .logo-container {
            background: rgba(231, 231, 231, 0.1);
            backdrop-filter: blur(15px);
            border: 1px solid rgba(231, 231, 231, 0.1);
        }

        .nav-item {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .nav-item:hover {
            box-shadow: 0 4px 12px rgba(109, 109, 109, 0.15);
        }

        /* Logout button at bottom */
        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid rgba(231, 231, 231, 0.1);
        }

        .logout-nav-item {
            display: flex;
            align-items: center;
            space-x: 2;
            padding: 12px 16px;
            border-radius: 8px;
            color: rgba(231, 231, 231, 0.7);
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
            transition: all 0.3s ease;
            cursor: pointer;
            background: none;
            border: none;
            width: 100%;
        }

        .logout-nav-item:hover {
            background: rgba(239, 68, 68, 0.1);
            color: #ef4444;
        }

        .logout-nav-item svg {
            margin-right: 8px;
        }
        
        /* ADDED: Prevent FOLC with CSS */
        body {
            transition: background-color 0.2s ease, color 0.2s ease;
        }

        /* ========================================
           PERBAIKAN: DASHBOARD FULL WIDTH OVERRIDE
           ======================================== */
        
        /* KHUSUS UNTUK DASHBOARD - Override main container */
        body.dashboard-page main {
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* PERBAIKAN: Override body background untuk dashboard */
        body.dashboard-page {
            background: #f8fafc !important;
        }

        body.dashboard-page.dark {
            background: #111827 !important;
        }

        /* PERBAIKAN: Ensure no container constraints untuk dashboard */
        body.dashboard-page .max-w-7xl,
        body.dashboard-page .container,
        body.dashboard-page .mx-auto {
            max-width: none !important;
            margin: 0 !important;
        }

        /* PERBAIKAN: Full width untuk dashboard content */
        body.dashboard-page main > * {
            width: 100%;
        }
    </style>
    
    <!-- PERBAIKAN: Add dashboard class to body if on dashboard page -->
    @if(request()->routeIs('dashboard'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('dashboard-page');
        });
    </script>
    @endif
</head>
<body class="font-sans antialiased bg-gray-50 dark:bg-gray-900">
    <div class="min-h-screen flex" x-data="darkMode">
        <!-- Sidebar -->
        <aside class="w-56 sidebar-green shadow-lg border-r border-gray-800/30 select-none">
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
                        <p class="text-xs text-gray-300 select-none">Management System</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <nav class="space-y-1 select-none">
                    <a href="{{ route('dashboard') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('dashboard') 
                                 ? 'nav-active-green' 
                                 : 'text-gray-300 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <rect x="3" y="3" width="7" height="7"/>
                            <rect x="14" y="3" width="7" height="7"/>
                            <rect x="14" y="14" width="7" height="7"/>
                            <rect x="3" y="14" width="7" height="7"/>
                        </svg>
                        <span class="select-none">Dashboard</span>
                    </a>

                    <a href="{{ route('karyawans.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('karyawans.*') 
                                 ? 'nav-active-green' 
                                 : 'text-gray-300 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/>
                            <circle cx="12" cy="7" r="4"/>
                        </svg>
                        <span class="select-none">Karyawan</span>
                    </a>

                    <a href="{{ route('timbangans.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('timbangans.*') 
                                 ? 'nav-active-green' 
                                 : 'text-gray-300 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="m12 3-1.912 5.813a2 2 0 0 1-1.275 1.275L3 12l5.813 1.912a2 2 0 0 1 1.275 1.275L12 21l1.912-5.813a2 2 0 0 1 1.275-1.275L21 12l-5.813-1.912a2 2 0 0 1-1.275-1.275L12 3Z"/>
                            <path d="M5 3v4"/>
                            <path d="M19 17v4"/>
                            <path d="M3 5h4"/>
                            <path d="M17 19h4"/>
                        </svg>
                        <span class="select-none">Timbangan</span>
                    </a>

                    <a href="{{ route('absensis.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('absensis.*') 
                                 ? 'nav-active-green' 
                                 : 'text-gray-300 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <path d="M9 11l3 3 8-8"/>
                            <path d="M21 12c0 4.97-4.03 9-9 9s-9-4.03-9-9 4.03-9 9-9c1.51 0 2.93.37 4.18 1.03"/>
                        </svg>
                        <span class="select-none">Absensi</span>
                    </a>

                    <a href="{{ route('gajis.index') }}" 
                       class="nav-item flex items-center space-x-2 px-3 py-2 rounded-lg text-sm font-medium transition-all select-none
                              {{ request()->routeIs('gajis.*') 
                                 ? 'nav-active-green' 
                                 : 'text-gray-300 nav-hover-green' }}">
                        <svg class="w-4 h-4 select-none pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                            <line x1="12" y1="1" x2="12" y2="23"/>
                            <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"/>
                        </svg>
                        <span class="select-none">Gaji</span>
                    </a>

                    <!-- Logout dibawah menu Gaji dengan spacing -->
                    <div class="pt-25">
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <button type="submit" class="logout-nav-item flex items-center w-full space-x-2 px-3 py-2 rounded-lg text-sm font-medium">
                                <svg class="w-4 h-4 select-none pointer-events-none" viewBox="0 0 24 24" fill="none" stroke="currentColor">
                                    <path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/>
                                    <polyline points="16,17 21,12 16,7"/>
                                    <line x1="21" y1="12" x2="9" y2="12"/>
                                </svg>
                                <span class="select-none">Logout</span>
                            </button>
                        </form>
                    </div>
                </nav>
            </div>
        </aside>

        <!-- Main Content -->
        <div class="flex-1 flex flex-col">
            <!-- Header -->
            <header class="header-green shadow-lg border-b border-gray-800/30 px-4 py-3 select-none">
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
                                    class="relative inline-flex h-6 w-11 items-center rounded-full transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-gray-300 focus:ring-offset-2 focus:ring-offset-gray-800 select-none shrink-0"
                                    :class="{ 'toggle-green': isDark, 'toggle-green-inactive': !isDark }"
                                    type="button"
                                    aria-label="Toggle dark mode"
                                    draggable="false">
                                <span class="inline-block h-4 w-4 transform rounded-full bg-white transition-transform duration-200 ease-in-out pointer-events-none select-none shadow-sm"
                                      :class="{ 'translate-x-6': isDark, 'translate-x-1': !isDark }"
                                      draggable="false">
                                </span>
                            </button>
                            <span class="text-sm text-gray-300 select-none pointer-events-none" 
                                  x-text="isDark ? 'Dark' : 'Light'"></span>
                        </div>
                        
                        <span class="text-gray-300 select-none pointer-events-none">{{ Auth::user()->name }}</span>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="flex-1 p-4 max-w-7xl mx-auto w-full">
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