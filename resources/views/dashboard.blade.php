<x-app-layout>
    @section('title', 'Dashboard')

    <style>
        /* ========================================
           NEW MODERN DASHBOARD DESIGN
           ======================================== */
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(30px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideInLeft {
            from { opacity: 0; transform: translateX(-30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes slideInRight {
            from { opacity: 0; transform: translateX(30px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-3px); }
        }

        @keyframes scaleIn {
            from { opacity: 0; transform: scale(0.95); }
            to { opacity: 1; transform: scale(1); }
        }

        @keyframes shimmer {
            0% { transform: translateX(-100%); }
            100% { transform: translateX(100%); }
        }

        .animate-fade-in-up {
            animation: fadeInUp 1s ease-out;
        }

        .animate-slide-in-left {
            animation: slideInLeft 0.8s ease-out;
        }

        .animate-slide-in-right {
            animation: slideInRight 0.8s ease-out;
        }

        .animate-float {
            animation: gentleFloat 4s ease-in-out infinite;
        }

        .animate-scale-in {
            animation: scaleIn 0.5s ease-out;
        }

        /* Enhanced scrollbar */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: rgba(0, 0, 0, 0.02);
            border-radius: 3px;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #d1d5db, #9ca3af);
            border-radius: 3px;
            transition: background 0.3s ease;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #9ca3af, #6b7280);
        }

        .dark .custom-scroll::-webkit-scrollbar-track {
            background: rgba(255, 255, 255, 0.02);
        }

        .dark .custom-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(180deg, #4b5563, #6b7280);
        }

        .dark .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(180deg, #6b7280, #9ca3af);
        }

        /* Modern chart containers */
        .chart-container {
            position: relative;
            width: 100%;
            height: 16rem;
            padding: 1rem;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.4));
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(10px);
        }

        .dark .chart-container {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.8), rgba(55, 65, 81, 0.4));
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .doughnut-container {
            position: relative;
            width: 12rem;
            height: 12rem;
            margin: 0 auto;
            padding: 1rem;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
            border-radius: 50%;
        }

        /* Modern welcome card */
        .welcome-card {
            background: linear-gradient(135deg, #111827 0%, #1f2937 50%, #111827 100%);
            position: relative;
            min-height: auto;
            overflow: hidden;
        }

        .dark .welcome-card {
            background: linear-gradient(135deg, #f9fafb 0%, #ffffff 50%, #f9fafb 100%);
        }

        .welcome-card::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 100%;
            height: 100%;
            background: radial-gradient(circle, rgba(255, 255, 255, 0.1), transparent);
            border-radius: 50%;
        }

        /* Modern cards with glassmorphism */
        .modern-card {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            backdrop-filter: blur(15px);
            -webkit-backdrop-filter: blur(15px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            overflow: hidden;
            transition: all 0.4s cubic-bezier(0.4, 0, 0.2, 1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.1);
        }

        .dark .modern-card {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.9), rgba(55, 65, 81, 0.7));
            border: 1px solid rgba(255, 255, 255, 0.1);
            box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        }

        .modern-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
        }

        .dark .modern-card:hover {
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.4);
        }

        /* Compact stats cards */
        .compact-stat-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.8));
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 16px;
            padding: 1.5rem;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }

        .dark .compact-stat-card {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.95), rgba(55, 65, 81, 0.8));
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .compact-stat-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.1), transparent);
            transition: left 0.6s ease;
        }

        .compact-stat-card:hover::before {
            left: 100%;
        }

        /* Enhanced list items with modern design */
        .modern-list-item {
            position: relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.8), rgba(255, 255, 255, 0.6));
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            border-radius: 12px;
            padding: 1rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .dark .modern-list-item {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.8), rgba(55, 65, 81, 0.6));
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .modern-list-item:hover {
            transform: translateX(8px);
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95), rgba(255, 255, 255, 0.8));
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        }

        .dark .modern-list-item:hover {
            background: linear-gradient(135deg, rgba(55, 65, 81, 0.95), rgba(55, 65, 81, 0.8));
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3);
        }

        /* Modern status badges */
        .modern-badge {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            border-radius: 20px;
            padding: 0.5rem 1rem;
            font-weight: 600;
            font-size: 0.8rem;
            transition: all 0.3s ease;
        }

        /* Modern indicators */
        .modern-indicator {
            position: relative;
            width: 12px;
            height: 12px;
            border-radius: 50%;
            animation: gentle-pulse 2s ease-in-out infinite;
        }

        @keyframes gentle-pulse {
            0%, 100% { opacity: 1; transform: scale(1); box-shadow: 0 0 10px currentColor; }
            50% { opacity: 0.8; transform: scale(1.2); box-shadow: 0 0 20px currentColor; }
        }

        /* Section headers with modern styling */
        .modern-section-header {
            position: relative;
            font-size: 1.5rem;
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
            bottom: -8px;
            left: 0;
            width: 40px;
            height: 3px;
            background: linear-gradient(90deg, #6b7280, transparent);
            border-radius: 2px;
        }

        /* Grid layouts */
        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 1rem;
            margin-bottom: 2rem;
        }

        .main-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 2rem;
            margin-bottom: 2rem;
        }

        .content-grid {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
        }

        @media (max-width: 1024px) {
            .main-grid,
            .content-grid {
                grid-template-columns: 1fr;
            }
        }

        /* Font smoothing */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
            text-rendering: optimizeLegibility;
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in-left,
            .animate-slide-in-right,
            .animate-float,
            .animate-scale-in {
                animation: none;
            }
        }
    </style>

    <div class="bg-gray-50 dark:bg-gray-900 transition-colors duration-500">
        <div class="space-y-6 px-6 py-8">
            
            <!-- Modern Welcome Card -->
            <div class="relative animate-scale-in">
                <div class="welcome-card rounded-3xl p-8 shadow-2xl border border-gray-800/20 dark:border-gray-200/20">
                    <div class="flex items-center space-x-6 relative z-10">
                        <div class="w-16 h-16 bg-gradient-to-br from-white/20 to-white/10 dark:from-gray-900/20 dark:to-gray-900/10 rounded-2xl flex items-center justify-center backdrop-blur-10 animate-float flex-shrink-0">
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
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <div class="w-12 h-12 bg-gradient-to-br from-amber-500 to-amber-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
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
                    <div class="modern-card p-6 animate-slide-in-left" style="animation-delay: 0.2s;">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="modern-section-header">Tren Gaji 6 Bulan</h3>
                            <div class="text-sm font-semibold text-gray-600 dark:text-gray-300 bg-white/50 dark:bg-gray-700/50 px-4 py-2 rounded-lg backdrop-blur-sm">
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
                        <div class="space-y-3 custom-scroll max-h-64 overflow-y-auto">
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
                    <div class="modern-card p-6 animate-slide-in-right" style="animation-delay: 0.2s;">
                        <div class="flex items-center justify-between mb-6">
                            <h3 class="modern-section-header">Timbangan Terbaru</h3>
                            <div class="modern-indicator bg-amber-500"></div>
                        </div>
                        <div class="space-y-3 custom-scroll max-h-64 overflow-y-auto">
                            @forelse($recentTimbangan->take(4) as $timbangan)
                                <div class="modern-list-item">
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full"></div>
                                            <span class="text-gray-900 dark:text-white font-semibold">{{ $timbangan->karyawan->nama }}</span>
                                        </div>
                                        <span class="text-xs font-semibold text-gray-600 dark:text-gray-300 bg-white/60 dark:bg-gray-600/60 px-3 py-1 rounded-lg">
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
                        <div class="flex items-center justify-between p-3 rounded-lg bg-white/60 dark:bg-gray-700/60 backdrop-blur-sm">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-900 dark:bg-gray-100 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">Hadir</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['hadir'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-lg bg-white/60 dark:bg-gray-700/60 backdrop-blur-sm">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-600 dark:bg-gray-400 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">Izin</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['izin'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between p-3 rounded-lg bg-white/60 dark:bg-gray-700/60 backdrop-blur-sm">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-300 dark:bg-gray-600 rounded-full"></div>
                                <span class="text-gray-700 dark:text-gray-300 font-medium">Tidak Hadir</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <!-- Top Performers -->
                <div class="modern-card p-6 animate-fade-in-up" style="animation-delay: 0.2s;">
                    <h3 class="modern-section-header">Top Performer Bulan Ini</h3>
                    <div class="space-y-3 custom-scroll max-h-80 overflow-y-auto">
                        @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                            <div class="modern-list-item">
                                <div class="flex items-center space-x-4">
                                    <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-200 dark:to-gray-400 text-white dark:text-gray-900 rounded-full flex items-center justify-center font-bold animate-float">
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
        // Enhanced theme detection with better performance
        const isDarkMode = () => document.documentElement.classList.contains('dark');
        
        // Same color palette - enhanced for better contrast
        const getThemeColors = () => {
            const dark = isDarkMode();
            return {
                background: dark ? '#1f2937' : '#ffffff',
                text: dark ? '#ffffff' : '#1f2937',
                textSecondary: dark ? '#d1d5db' : '#6b7280',
                border: dark ? '#374151' : '#e5e7eb',
                gridLines: dark ? '#374151' : '#f3f4f6',
                primary: dark ? '#f9fafb' : '#1f2937',
                secondary: dark ? '#d1d5db' : '#6b7280',
                tertiary: dark ? '#9ca3af' : '#9ca3af'
            };
        };

        // Enhanced Chart.js configuration
        Chart.defaults.font.family = "'Inter', -apple-system, BlinkMacSystemFont, sans-serif";
        Chart.defaults.font.weight = '600';
        Chart.defaults.color = getThemeColors().textSecondary;
        Chart.defaults.plugins.legend.display = false;

        // Enhanced Activity Chart with better styling
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
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    borderWidth: 3,
                    pointBackgroundColor: getThemeColors().background,
                    pointBorderColor: getThemeColors().primary,
                    pointBorderWidth: 2,
                    pointHoverBorderWidth: 3
                }, {
                    label: 'Timbangan',
                    data: @json($timbangan7Hari),
                    borderColor: getThemeColors().secondary,
                    backgroundColor: getThemeColors().secondary + '20',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 5,
                    pointHoverRadius: 7,
                    borderWidth: 3,
                    pointBackgroundColor: getThemeColors().background,
                    pointBorderColor: getThemeColors().secondary,
                    pointBorderWidth: 2,
                    pointHoverBorderWidth: 3
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
                            drawBorder: false,
                            lineWidth: 1
                        },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 12,
                            font: { weight: '600', size: 11 }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 8,
                            font: { weight: '600', size: 11 }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: getThemeColors().background + 'f0',
                        titleColor: getThemeColors().text,
                        bodyColor: getThemeColors().text,
                        borderColor: getThemeColors().border,
                        borderWidth: 1,
                        cornerRadius: 12,
                        padding: 16,
                        titleFont: { weight: 'bold', size: 14 },
                        bodyFont: { weight: '600', size: 12 }
                    }
                }
            }
        });

        // Enhanced Salary Chart
        const gajiCtx = document.getElementById('gajiChart').getContext('2d');
        const gajiChart = new Chart(gajiCtx, {
            type: 'bar',
            data: {
                labels: @json($bulanLabels),
                datasets: [{
                    label: 'Total Gaji',
                    data: @json($gajiBulanan),
                    backgroundColor: getThemeColors().primary,
                    borderRadius: 8,
                    borderSkipped: false,
                    maxBarThickness: 40
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
                            drawBorder: false,
                            lineWidth: 1
                        },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 12,
                            font: { weight: '600', size: 11 },
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
                            font: { weight: '600', size: 11 }
                        }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: getThemeColors().background + 'f0',
                        titleColor: getThemeColors().text,
                        bodyColor: getThemeColors().text,
                        borderColor: getThemeColors().border,
                        borderWidth: 1,
                        cornerRadius: 12,
                        padding: 16,
                        titleFont: { weight: 'bold', size: 14 },
                        bodyFont: { weight: '600', size: 12 },
                        callbacks: {
                            label: function(context) {
                                return 'Total Gaji: Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                            }
                        }
                    }
                }
            }
        });

        // Enhanced Doughnut Chart
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
                    borderWidth: 3,
                    borderColor: getThemeColors().background,
                    cutout: '65%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1,
                plugins: {
                    tooltip: {
                        backgroundColor: getThemeColors().background + 'f0',
                        titleColor: getThemeColors().text,
                        bodyColor: getThemeColors().text,
                        borderColor: getThemeColors().border,
                        borderWidth: 1,
                        cornerRadius: 12,
                        padding: 16,
                        titleFont: { weight: 'bold', size: 14 },
                        bodyFont: { weight: '600', size: 12 }
                    }
                }
            }
        });

        // Enhanced theme change handler
        const observer = new MutationObserver(() => {
            const colors = getThemeColors();
            
            [activityChart, gajiChart, absensiChart].forEach(chart => {
                if (chart) {
                    // Update chart colors
                    if (chart.options.scales?.y?.grid) {
                        chart.options.scales.y.grid.color = colors.gridLines;
                    }
                    if (chart.options.scales?.y?.ticks) {
                        chart.options.scales.y.ticks.color = colors.textSecondary;
                    }
                    if (chart.options.scales?.x?.ticks) {
                        chart.options.scales.x.ticks.color = colors.textSecondary;
                    }
                    
                    if (chart.options.plugins?.tooltip) {
                        chart.options.plugins.tooltip.backgroundColor = colors.background + 'f0';
                        chart.options.plugins.tooltip.titleColor = colors.text;
                        chart.options.plugins.tooltip.bodyColor = colors.text;
                        chart.options.plugins.tooltip.borderColor = colors.border;
                    }
                    
                    if (chart.config.type === 'line') {
                        chart.data.datasets[0].borderColor = colors.primary;
                        chart.data.datasets[0].backgroundColor = colors.primary + '20';
                        chart.data.datasets[0].pointBorderColor = colors.primary;
                        chart.data.datasets[1].borderColor = colors.secondary;
                        chart.data.datasets[1].backgroundColor = colors.secondary + '20';
                        chart.data.datasets[1].pointBorderColor = colors.secondary;
                    }
                    
                    if (chart.config.type === 'bar') {
                        chart.data.datasets[0].backgroundColor = colors.primary;
                    }
                    
                    chart.update();
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });

        console.log('✨ Modern Dashboard Loaded Successfully!');
    </script>
    @endpush
</x-app-layout>