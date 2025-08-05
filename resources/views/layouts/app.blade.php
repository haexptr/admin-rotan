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

        /* User info section */
        .user-info {
            background: rgba(231, 231, 231, 0.1);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(231, 231, 231, 0.1);
            border-radius: 8px;
            padding: 12px 16px;
            margin-bottom: 16px;
        }

        .user-name {
            color: #ffffff;
            font-weight: 600;
            font-size: 14px;
            margin-bottom: 4px;
        }

        .user-role {
            color: rgba(231, 231, 231, 0.7);
            font-size: 12px;
        }

        /* Fixed sidebar */
        .sidebar-fixed {
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            overflow-y: auto;
            z-index: 50;
        }

        /* Main content offset untuk memberikan ruang untuk sidebar fixed */
        .main-content-offset {
            margin-left: 224px; /* 224px = w-56 (14rem * 16px) */
        }

        /* Sidebar bottom controls */
        .sidebar-bottom {
            margin-top: auto;
            padding: 16px 20px;
            border-top: 1px solid rgba(231, 231, 231, 0.1);
        }

        /* Custom scrollbar untuk sidebar */
        .sidebar-fixed::-webkit-scrollbar {
            width: 6px;
        }

        .sidebar-fixed::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.1);
        }

        .sidebar-fixed::-webkit-scrollbar-thumb {
            background: rgba(255, 255, 255, 0.2);
            border-radius: 3px;
        }

        .sidebar-fixed::-webkit-scrollbar-thumb:hover {
            background: rgba(255, 255, 255, 0.3);
        }

        /* FORCE OVERRIDE - Modern Theme Toggle - No Card Style */
        .theme-toggle {
            display: flex !important;
            align-items: center !important;
            justify-content: flex-start !important; /* Align left like nav items */
            padding: 12px 16px !important; /* Same padding as nav items */
            margin: 0 !important; /* Remove margin */
            margin-bottom: 4px !important; /* Same spacing as nav items */
            border-radius: 8px !important; /* Same border radius as nav items */
            background: transparent !important; /* No background - flat like nav items */
            border: none !important; /* No border - flat like nav items */
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
            cursor: pointer !important;
            position: relative !important;
            overflow: visible !important; /* No overflow hidden */
            width: 100% !important; /* Full width like nav items */
        }

        .theme-toggle::before {
            display: none !important; /* Remove shimmer effect */
        }

        .theme-toggle:hover::before {
            display: none !important; /* Remove shimmer effect */
        }

        .theme-toggle:hover {
            background: transparent !important; /* No hover background */
            border-color: transparent !important;
            transform: none !important; /* No hover transform */
            box-shadow: none !important; /* No shadow */
        }

        /* Override nav-hover-green for theme toggle */
        .theme-toggle.nav-hover-green:hover {
            background: transparent !important;
            color: inherit !important;
            transform: none !important;
            transition: none !important;
        }

        /* Beautiful Toggle Switch - FORCED */
        .theme-switch {
            position: relative !important;
            width: 56px !important;
            height: 30px !important;
            border-radius: 15px !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            cursor: pointer !important;
            border: 2px solid transparent !important;
            overflow: hidden !important;
        }

        .theme-switch.inactive {
            background: linear-gradient(135deg, #fbbf24, #f59e0b, #d97706) !important;
            box-shadow: 
                0 4px 8px rgba(251, 191, 36, 0.3) !important,
                inset 0 2px 4px rgba(0, 0, 0, 0.1) !important;
        }

        .theme-switch.active {
            background: linear-gradient(135deg, #6366f1, #4f46e5, #3730a3) !important;
            box-shadow: 
                0 4px 8px rgba(99, 102, 241, 0.3) !important,
                inset 0 2px 4px rgba(0, 0, 0, 0.2) !important;
        }

        .theme-switch:focus {
            outline: none !important;
            box-shadow: 0 0 0 3px rgba(99, 102, 241, 0.3) !important;
        }

        /* Animated Slider - FORCED */
        .theme-slider {
            position: absolute !important;
            top: 2px !important;
            left: 2px !important;
            width: 22px !important;
            height: 22px !important;
            background: linear-gradient(135deg, #ffffff, #f8fafc) !important;
            border-radius: 50% !important;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1) !important;
            display: flex !important;
            align-items: center !important;
            justify-content: center !important;
            z-index: 10 !important;
            border: 1px solid rgba(0, 0, 0, 0.05) !important;
        }

        .theme-slider.active {
            transform: translateX(26px) !important;
            box-shadow: 
                0 4px 8px rgba(99, 102, 241, 0.3) !important,
                0 2px 4px rgba(0, 0, 0, 0.1) !important,
                inset 0 1px 2px rgba(255, 255, 255, 0.3) !important;
        }

        .theme-slider.inactive {
            transform: translateX(0) !important;
            box-shadow: 
                0 4px 8px rgba(251, 191, 36, 0.3) !important,
                0 2px 4px rgba(0, 0, 0, 0.1) !important,
                inset 0 1px 2px rgba(255, 255, 255, 0.3) !important;
        }

        /* Beautiful Icons - FORCED */
        .theme-icon {
            width: 14px !important;
            height: 14px !important;
            transition: all 0.3s ease !important;
            filter: drop-shadow(0 1px 2px rgba(0, 0, 0, 0.2)) !important;
        }

        .theme-icon.sun {
            color: #f59e0b !important;
            animation: rotate-sun 20s linear infinite !important;
        }

        .theme-icon.moon {
            color: #6366f1 !important;
            animation: glow-moon 2s ease-in-out infinite alternate !important;
        }

        @keyframes rotate-sun {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        @keyframes glow-moon {
            from { filter: drop-shadow(0 0 2px rgba(99, 102, 241, 0.3)); }
            to { filter: drop-shadow(0 0 8px rgba(99, 102, 241, 0.6)); }
        }

        /* Hover effects - FORCED */
        .theme-toggle:hover .theme-slider {
            transform: scale(1.05) !important;
        }

        .theme-toggle:hover .theme-slider.active {
            transform: translateX(26px) scale(1.05) !important;
        }

        .theme-toggle:active .theme-slider {
            transform: scale(0.95) !important;
        }

        .theme-toggle:active .theme-slider.active {
            transform: translateX(26px) scale(0.95) !important;
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
           FIXED: PROPER DASHBOARD SPACING
           ======================================== */
        
        /* FIXED: Gentle dashboard overrides - no aggressive !important */
        body.dashboard-page main {
            max-width: 100%;
            padding: 2rem 1.5rem;
        }

        /* FIXED: Ensure proper background */
        body.dashboard-page {
            background: #f8fafc;
        }

        body.dashboard-page.dark {
            background: #111827;
        }

        /* FIXED: Better responsive padding for dashboard */
        @media (min-width: 1024px) {
            body.dashboard-page main {
                padding: 2rem 3rem;
            }
        }

        @media (min-width: 1280px) {
            body.dashboard-page main {
                padding: 2rem 4rem;
            }
        }

        /* ADDED: Better card spacing and content padding */
        body.dashboard-page .dashboard-card {
            padding: 1.5rem 2rem;
        }

        body.dashboard-page .dashboard-grid {
            gap: 2rem;
        }

        @media (max-width: 768px) {
            body.dashboard-page main {
                padding: 1rem;
            }
            
            body.dashboard-page .dashboard-grid {
                gap: 1.5rem;
            }
            
            body.dashboard-page .dashboard-card {
                padding: 1.25rem 1.5rem;
            }
        }

        /* TEMPORARY FIX: Hide any duplicate dark mode toggles outside sidebar */
        body > div:not(.min-h-screen) [class*="dark"],
        .fixed.top-4.right-4,
        .absolute.top-4.right-4 {
            display: none !important;
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
    <div class="min-h-screen" x-data="darkMode">
        <!-- Fixed Sidebar -->
        <aside class="w-56 sidebar-green sidebar-fixed shadow-lg border-r border-gray-800/30 select-none flex flex-col">
            <div class="p-4 flex-1 flex flex-col h-full">
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

                <!-- User Info Section -->
                <div class="user-info select-none">
                    <div class="user-name">{{ Auth::user()->name }}</div>
                    <div class="user-role">Administrator</div>
                </div>

                <!-- Navigation Menu -->
                <nav class="space-y-1 select-none flex-1">
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
                </nav>

                <!-- Bottom Controls -->
                <div class="sidebar-bottom">
                    <!-- Beautiful Theme Toggle - No Hover -->
                    <div class="dark-mode-toggle theme-toggle" @click="toggle()" title="Toggle Theme">
                        <button class="theme-switch select-none focus:outline-none"
                                :class="{ 'active': isDark, 'inactive': !isDark }"
                                type="button"
                                aria-label="Toggle dark mode">
                            <div class="theme-slider"
                                 :class="{ 'active': isDark, 'inactive': !isDark }">
                                <!-- Sun icon for light mode -->
                                <svg x-show="!isDark" class="theme-icon sun" viewBox="0 0 24 24" fill="currentColor">
                                    <path d="M12 2.25a.75.75 0 01.75.75v2.25a.75.75 0 01-1.5 0V3a.75.75 0 01.75-.75zM7.5 12a4.5 4.5 0 119 0 4.5 4.5 0 01-9 0zM18.894 6.166a.75.75 0 00-1.06-1.06l-1.591 1.59a.75.75 0 101.06 1.061l1.591-1.59zM21.75 12a.75.75 0 01-.75.75h-2.25a.75.75 0 010-1.5H21a.75.75 0 01.75.75zM17.834 18.894a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 10-1.061 1.06l1.59 1.591zM12 18a.75.75 0 01.75.75V21a.75.75 0 01-1.5 0v-2.25A.75.75 0 0112 18zM7.758 17.303a.75.75 0 00-1.061-1.06l-1.591 1.59a.75.75 0 001.06 1.061l1.591-1.59zM6 12a.75.75 0 01-.75.75H3a.75.75 0 010-1.5h2.25A.75.75 0 016 12zM6.697 7.757a.75.75 0 001.06-1.06l-1.59-1.591a.75.75 0 00-1.061 1.06l1.59 1.591z"/>
                                </svg>
                                <!-- Moon icon for dark mode -->
                                <svg x-show="isDark" class="theme-icon moon" viewBox="0 0 24 24" fill="currentColor">
                                    <path fill-rule="evenodd" d="M9.528 1.718a.75.75 0 01.162.819A8.97 8.97 0 009 6a9 9 0 009 9 8.97 8.97 0 003.463-.69.75.75 0 01.981.98 10.503 10.503 0 01-9.694 6.46c-5.799 0-10.5-4.701-10.5-10.5 0-4.368 2.667-8.112 6.46-9.694a.75.75 0 01.818.162z" clip-rule="evenodd"/>
                                </svg>
                            </div>
                        </button>
                    </div>

                    <!-- Logout Button -->
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
            </div>
        </aside>

        <!-- Main Content with offset -->
        <div class="main-content-offset flex flex-col">
            <!-- FIXED: Page Content with Proper Spacing -->
            <main class="flex-1">
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