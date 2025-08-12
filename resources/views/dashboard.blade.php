<x-app-layout>
    @section('title', 'Dashboard')

    <style>
        /* ========================================
           OPTIMIZED DASHBOARD DESIGN - NO SCROLLBAR
           ======================================== */
        
        /* Hide ALL scrollbars globally */
        * {
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* Internet Explorer 10+ */
        }
        
        *::-webkit-scrollbar {
            display: none; /* WebKit */
        }

        body {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        body::-webkit-scrollbar {
            display: none;
        }

        html {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        html::-webkit-scrollbar {
            display: none;
        }

        /* Remove scrollbar from specific containers */
        .custom-scroll,
        .overflow-y-auto,
        .overflow-auto {
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }

        .custom-scroll::-webkit-scrollbar,
        .overflow-y-auto::-webkit-scrollbar,
        .overflow-auto::-webkit-scrollbar {
            display: none !important;
        }
        
        /* Simplified animations - better performance */
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(20px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.98); }
            to { opacity: 1; transform: scale(1); }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.4s ease-out;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.4s ease-out;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.4s ease-out;
        }

        .animate-scale-in {
            animation: scaleIn 0.3s ease-out;
        }

        /* Smooth transitions for dark mode - prevents flash */
        * {
            transition: background-color 0.2s ease, border-color 0.2s ease, color 0.2s ease, box-shadow 0.2s ease;
        }

        /* Optimized chart containers - full width friendly */
        .chart-container {
            position: relative;
            width: 100%;
            height: 18rem;
            padding: 1rem;
            background: rgb(255 255 255);
            border-radius: 12px;
            border: 1px solid rgb(229 231 235);
        }

        .dark .chart-container {
            background: rgb(31 41 55);
            border: 1px solid rgb(55 65 81);
        }

        .doughnut-container {
            position: relative;
            width: 12rem;
            height: 12rem;
            margin: 0 auto;
            padding: 1rem;
        }

        /* Simplified welcome card - removed heavy gradients */
        .welcome-card {
            background: linear-gradient(135deg, #1f2937 0%, #111827 100%);
            position: relative;
            min-height: auto;
            overflow: hidden;
        }

        .dark .welcome-card {
            background: linear-gradient(135deg, #ffffff 0%, #f9fafb 100%);
        }

        /* Optimized cards - removed backdrop-filter for performance */
        .modern-card {
            position: relative;
            background: rgb(255 255 255);
            border: 1px solid rgb(229 231 235);
            border-radius: 16px;
            overflow: hidden;
            transition: all 0.3s ease;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1);
        }

        .dark .modern-card {
            background: rgb(31 41 55);
            border: 1px solid rgb(55 65 81);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.25);
        }

        .modern-card:hover {
            transform: translateY(-4px);
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.15);
        }

        .dark .modern-card:hover {
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.35);
        }

        /* Simplified stat cards */
        .compact-stat-card {
            background: rgb(255 255 255);
            border: 1px solid rgb(229 231 235);
            border-radius: 12px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dark .compact-stat-card {
            background: rgb(31 41 55);
            border: 1px solid rgb(55 65 81);
        }

        .compact-stat-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .dark .compact-stat-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.25);
        }

        /* Simplified list items */
        .modern-list-item {
            position: relative;
            background: rgb(249 250 251);
            border: 1px solid rgb(229 231 235);
            border-radius: 8px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.2s ease;
        }

        .dark .modern-list-item {
            background: rgb(55 65 81);
            border: 1px solid rgb(75 85 99);
        }

        .modern-list-item:hover {
            transform: translateX(4px);
            background: rgb(243 244 246);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.08);
        }

        .dark .modern-list-item:hover {
            background: rgb(75 85 99);
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        }

        /* Simplified badges */
        .modern-badge {
            background: rgb(249 250 251);
            border: 1px solid rgb(229 231 235);
            border-radius: 16px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.2s ease;
        }

        .dark .modern-badge {
            background: rgb(55 65 81);
            border: 1px solid rgb(75 85 99);
        }

        /* Simplified indicators */
        .modern-indicator {
            position: relative;
            width: 8px;
            height: 8px;
            border-radius: 50%;
            display: inline-block;
        }

        /* Section headers */
        .modern-section-header {
            position: relative;
            font-size: 1.25rem;
            font-weight: 700;
            color: #1f2937;
            margin-bottom: 1.5rem;
        }

        .dark .modern-section-header {
            color: #f9fafb;
        }

        .modern-section-header::after {
            content: '';
            position: absolute;
            bottom: -6px;
            left: 0;
            width: 32px;
            height: 2px;
            background: #6b7280;
            border-radius: 1px;
        }

        /* Grid layouts - optimized for full width */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 1.5rem;
            margin-bottom: 2rem;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
        }

        /* NO SCROLLBAR CONTAINERS */
        .no-scroll {
            overflow: hidden !important;
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }

        .no-scroll::-webkit-scrollbar {
            display: none !important;
        }

        /* Make containers height-controlled to prevent scrolling */
        .max-h-64 {
            max-height: 16rem;
            overflow: hidden !important;
        }

        .max-h-80 {
            max-height: 20rem;
            overflow: hidden !important;
        }

        @media (max-width: 1280px) {
            .main-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 1024px) {
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        @media (max-width: 640px) {
            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }

        @media (max-width: 480px) {
            .stats-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Font optimization */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Reduced motion support */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in-left,
            .animate-slide-in-right,
            .animate-scale-in {
                animation: none;
            }
        }
    </style>

    <div class="bg-gray-50 dark:bg-gray-900 min-h-screen no-scroll">
        <div class="space-y-6 px-4 py-6 max-w-none w-full">
            
            <!-- Modern Welcome Card -->
            <div class="relative animate-scale-in">
                <div class="welcome-card rounded-2xl p-8 shadow-lg border border-gray-800/20 dark:border-gray-200/20">
                    <div class="flex items-center space-x-6 relative z-10">
                        <div class="w-16 h-16 bg-white/20 dark:bg-gray-900/20 rounded-xl flex items-center justify-center flex-shrink-0">
                            <svg class="w-8 h-8 text-white dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="min-w-0 flex-1">
                            <h1 class="text-3xl font-black text-white dark:text-gray-900 mb-2 tracking-tight">
                                Selamat Datang, {{ Auth::user()->name }}!
                            </h1>
                            <p class="text-lg text-gray-300 dark:text-gray-600 font-medium">
                                Sistem Manajemen Admin Rotan • {{ date('d F Y') }}
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Modern Stats Grid -->
            <div class="stats-grid animate-fade-in-up">
                <div class="compact-stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Total Karyawan</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalKaryawan ?? '4' }}</p>
                        </div>
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="compact-stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Absensi Hari Ini</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $absensiHariIni ?? '3' }}</p>
                        </div>
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="compact-stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Total Timbangan</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">{{ $totalTimbangan ?? '12' }}</p>
                        </div>
                        <div class="w-12 h-12 bg-amber-100 dark:bg-amber-900 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-amber-600 dark:text-amber-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                    </div>
                </div>

                <div class="compact-stat-card">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-300 mb-1">Total Gaji</p>
                            <p class="text-2xl font-bold text-gray-900 dark:text-white">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</p>
                        </div>
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="main-grid">
                <!-- Charts Section -->
                <div class="space-y-6">
                    <!-- Trend Chart -->
                    <div class="modern-card p-6 animate-slide-in-left">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="modern-section-header">Tren Aktivitas 7 Hari</h3>
                            <div class="flex items-center space-x-4 text-sm font-semibold">
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-slate-600 dark:bg-slate-400 rounded-full"></div>
                                    <span class="text-gray-600 dark:text-gray-300">Absensi</span>
                                </div>
                                <div class="flex items-center space-x-2">
                                    <div class="w-3 h-3 bg-slate-400 dark:bg-slate-300 rounded-full"></div>
                                    <span class="text-gray-600 dark:text-gray-300">Timbangan</span>
                                </div>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="activityChart"></canvas>
                        </div>
                    </div>

                    <!-- Salary Chart -->
                    <div class="modern-card p-6 animate-slide-in-left" style="animation-delay: 0.1s;">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="modern-section-header">Tren Gaji 6 Bulan</h3>
                            <div class="text-sm font-semibold text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-700 px-4 py-2 rounded-lg">
                                Total: <span class="font-bold text-gray-900 dark:text-white">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</span>
                            </div>
                        </div>
                        <div class="chart-container">
                            <canvas id="gajiChart"></canvas>
                        </div>
                    </div>
                </div>

                <!-- Activity Lists Section -->
                <div class="space-y-6">
                    <!-- Recent Attendance -->
                    <div class="modern-card p-6 animate-slide-in-right">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="modern-section-header">Absensi Terbaru</h3>
                            <div class="modern-indicator bg-emerald-500"></div>
                        </div>
                        <div class="space-y-3 no-scroll max-h-64">
                            @forelse($recentAbsensi->take(4) as $absensi)
                                <div class="modern-list-item">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full"></div>
                                            <span class="text-gray-900 dark:text-white font-semibold">{{ $absensi->karyawan->nama }}</span>
                                        </div>
                                        <span class="modern-badge text-xs
                                            {{ $absensi->hadir ? 'bg-emerald-50 text-emerald-700 border-emerald-200' : 
                                            ($absensi->izin ? 'bg-amber-50 text-amber-700 border-amber-200' : 
                                            'bg-rose-50 text-rose-700 border-rose-200') }}">
                                            {{ $absensi->hadir ? 'Hadir' : ($absensi->izin ? 'Izin' : 'Tidak Hadir') }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada data absensi</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Recent Weighing -->
                    <div class="modern-card p-6 animate-slide-in-right" style="animation-delay: 0.1s;">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="modern-section-header">Timbangan Terbaru</h3>
                            <div class="modern-indicator bg-amber-500"></div>
                        </div>
                        <div class="space-y-3 no-scroll max-h-64">
                            @forelse($recentTimbangan->take(4) as $timbangan)
                                <div class="modern-list-item">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full"></div>
                                            <span class="text-gray-900 dark:text-white font-semibold">{{ $timbangan->karyawan->nama }}</span>
                                        </div>
                                        <span class="text-xs font-semibold text-gray-600 dark:text-gray-300 bg-gray-100 dark:bg-gray-600 px-3 py-1 rounded-lg">
                                            {{ $timbangan->deskripsi_timbangan }}
                                        </span>
                                    </div>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                        <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada data timbangan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>

            <!-- Bottom Section Grid -->
            <div class="content-grid">
                <!-- Attendance Status -->
                <div class="modern-card p-6 animate-fade-in-up">
                    <h3 class="modern-section-header">Status Absensi Bulan Ini</h3>
                    <div class="flex items-center justify-center mb-6">
                        <div class="doughnut-container">
                            <canvas id="absensiChart"></canvas>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-900 dark:bg-gray-100 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">Hadir</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['hadir'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-600 dark:bg-gray-400 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">Izin</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['izin'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-lg bg-gray-50 dark:bg-gray-700">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">Tidak Hadir</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <!-- Top Performers -->
                <div class="modern-card p-6 animate-fade-in-up" style="animation-delay: 0.1s;">
                    <h3 class="modern-section-header">Top Performer Bulan Ini</h3>
                    <div class="space-y-3 no-scroll max-h-80">
                        @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                            <div class="modern-list-item">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-gray-700 dark:bg-gray-300 text-white dark:text-gray-900 rounded-full flex items-center justify-center font-bold">
                                        {{ $index + 1 }}
                                    </div>
                                    <div class="flex-1">
                                        <p class="font-bold text-gray-900 dark:text-white">{{ $karyawan->nama }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-300">{{ $karyawan->total_hadir }} hari hadir</p>
                                    </div>
                                    <span class="modern-badge bg-emerald-50 text-emerald-700 border-emerald-200">
                                        {{ round(($karyawan->total_hadir / 30) * 100) }}%
                                    </span>
                                </div>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-20 h-20 mx-auto mb-6 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                    <svg class="w-10 h-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-600 dark:text-gray-300 font-semibold">Belum ada data performer</p>
                                <p class="text-sm text-gray-500 dark:text-gray-500 mt-1">Data akan muncul setelah ada aktivitas absensi</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <script>
        // Optimized theme detection
        const isDarkMode = () => document.documentElement.classList.contains('dark');
        
        // Simplified color palette
        const getThemeColors = () => {
            const dark = isDarkMode();
            return {
                background: dark ? '#1f2937' : '#ffffff',
                text: dark ? '#ffffff' : '#1f2937',
                textSecondary: dark ? '#d1d5db' : '#6b7280',
                border: dark ? '#374151' : '#e5e7eb',
                gridLines: dark ? '#374151' : '#f3f4f6',
                primary: dark ? '#f9fafb' : '#1f2937',
                secondary: dark ? '#d1d5db' : '#6b7280'
            };
        };

        // Optimized Chart.js defaults
        Chart.defaults.font.family = "'Inter', -apple-system, BlinkMacSystemFont, sans-serif";
        Chart.defaults.font.weight = '500';
        Chart.defaults.color = getThemeColors().textSecondary;
        Chart.defaults.plugins.legend.display = false;

        // Activity Chart - optimized
        const activityCtx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(activityCtx, {
            type: 'line',
            data: {
                labels: @json($tanggal7Hari),
                datasets: [{
                    label: 'Absensi',
                    data: @json($absensi7Hari),
                    borderColor: getThemeColors().primary,
                    backgroundColor: getThemeColors().primary + '20',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    borderWidth: 2,
                    pointBackgroundColor: getThemeColors().background,
                    pointBorderColor: getThemeColors().primary,
                    pointBorderWidth: 2
                }, {
                    label: 'Timbangan',
                    data: @json($timbangan7Hari),
                    borderColor: getThemeColors().secondary,
                    backgroundColor: getThemeColors().secondary + '20',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6,
                    borderWidth: 2,
                    pointBackgroundColor: getThemeColors().background,
                    pointBorderColor: getThemeColors().secondary,
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                interaction: {
                    intersect: false,
                    mode: 'index'
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { 
                            color: getThemeColors().gridLines,
                            drawBorder: false
                        },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 8,
                            font: { size: 11 }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 8,
                            font: { size: 11 }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: getThemeColors().background,
                        titleColor: getThemeColors().text,
                        bodyColor: getThemeColors().text,
                        borderColor: getThemeColors().border,
                        borderWidth: 1,
                        cornerRadius: 8,
                        padding: 12
                    }
                }
            }
        });

        // Salary Chart - optimized
        const gajiCtx = document.getElementById('gajiChart').getContext('2d');
        const gajiChart = new Chart(gajiCtx, {
            type: 'bar',
            data: {
                labels: @json($bulanLabels),
                datasets: [{
                    label: 'Total Gaji',
                    data: @json($gajiBulanan),
                    backgroundColor: getThemeColors().primary,
                    borderRadius: 6,
                    borderSkipped: false,
                    maxBarThickness: 32
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { 
                            color: getThemeColors().gridLines,
                            drawBorder: false
                        },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 8,
                            font: { size: 11 },
                            callback: function(value) {
                                if (value >= 1000000) {
                                    return 'Rp ' + (value/1000000).toFixed(1) + 'M';
                                } else if (value >= 1000) {
                                    return 'Rp ' + (value/1000).toFixed(0) + 'K';
                                } else {
                                    return 'Rp ' + value;
                                }
                            }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 8,
                            font: { size: 11 }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: getThemeColors().background,
                        titleColor: getThemeColors().text,
                        bodyColor: getThemeColors().text,
                        borderColor: getThemeColors().border,
                        borderWidth: 1,
                        cornerRadius: 8,
                        padding: 12,
                        callbacks: {
                            label: function(context) {
                                return 'Total Gaji: Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                            }
                        }
                    }
                }
            }
        });

        // Doughnut Chart - optimized
        const absensiCtx = document.getElementById('absensiChart').getContext('2d');
        const absensiChart = new Chart(absensiCtx, {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Izin', 'Tidak Hadir'],
                datasets: [{
                    data: [
                        {{ $absensiStats['hadir'] ?? 0 }},
                        {{ $absensiStats['izin'] ?? 0 }},
                        {{ $absensiStats['tidak_hadir'] ?? 0 }}
                    ],
                    backgroundColor: [
                        isDarkMode() ? '#f9fafb' : '#111827',
                        isDarkMode() ? '#9ca3af' : '#4b5563',
                        isDarkMode() ? '#4b5563' : '#d1d5db'
                    ],
                    borderWidth: 2,
                    borderColor: getThemeColors().background,
                    cutout: '60%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    tooltip: {
                        backgroundColor: getThemeColors().background,
                        titleColor: getThemeColors().text,
                        bodyColor: getThemeColors().text,
                        borderColor: getThemeColors().border,
                        borderWidth: 1,
                        cornerRadius: 8,
                        padding: 12
                    }
                }
            }
        });

        // Optimized theme change handler
        const observer = new MutationObserver(() => {
            const colors = getThemeColors();
            
            // Update all charts efficiently
            [activityChart, gajiChart, absensiChart].forEach(chart => {
                if (chart) {
                    // Update scales
                    if (chart.options.scales?.y?.grid) {
                        chart.options.scales.y.grid.color = colors.gridLines;
                        chart.options.scales.y.ticks.color = colors.textSecondary;
                    }
                    if (chart.options.scales?.x?.ticks) {
                        chart.options.scales.x.ticks.color = colors.textSecondary;
                    }
                    
                    // Update tooltips
                    if (chart.options.plugins?.tooltip) {
                        chart.options.plugins.tooltip.backgroundColor = colors.background;
                        chart.options.plugins.tooltip.titleColor = colors.text;
                        chart.options.plugins.tooltip.bodyColor = colors.text;
                        chart.options.plugins.tooltip.borderColor = colors.border;
                    }
                    
                    // Update datasets
                    if (chart.config.type === 'line') {
                        chart.data.datasets[0].borderColor = colors.primary;
                        chart.data.datasets[0].backgroundColor = colors.primary + '20';
                        chart.data.datasets[0].pointBorderColor = colors.primary;
                        chart.data.datasets[0].pointBackgroundColor = colors.background;
                        chart.data.datasets[1].borderColor = colors.secondary;
                        chart.data.datasets[1].backgroundColor = colors.secondary + '20';
                        chart.data.datasets[1].pointBorderColor = colors.secondary;
                        chart.data.datasets[1].pointBackgroundColor = colors.background;
                    }
                    
                    if (chart.config.type === 'bar') {
                        chart.data.datasets[0].backgroundColor = colors.primary;
                    }
                    
                    if (chart.config.type === 'doughnut') {
                        chart.data.datasets[0].backgroundColor = [
                            isDarkMode() ? '#f9fafb' : '#111827',
                            isDarkMode() ? '#9ca3af' : '#4b5563',
                            isDarkMode() ? '#4b5563' : '#d1d5db'
                        ];
                        chart.data.datasets[0].borderColor = colors.background;
                    }
                    
                    // Update without animation for smoother dark mode transition
                    chart.update('none');
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });

        console.log('✅ Dashboard Tanpa Scrollbar Loaded Successfully!');
    </script>
    @endpush
</x-app-layout>