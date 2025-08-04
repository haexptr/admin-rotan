<x-app-layout>
    @section('title', 'Dashboard')

    <!-- Enhanced CSS untuk Dashboard TANPA Scrollbar -->
    <style>
        /* ========================================
           HIDE ALL SCROLLBARS BUT KEEP SCROLLING
           ======================================== */

        /* Hide scrollbar for Chrome, Safari and Opera */
        ::-webkit-scrollbar {
            width: 0px;
            height: 0px;
            background: transparent;
        }

        ::-webkit-scrollbar-track {
            display: none;
        }

        ::-webkit-scrollbar-thumb {
            display: none;
        }

        /* Hide scrollbar for Firefox */
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        /* Hide scrollbar for IE and Edge */
        body {
            -ms-overflow-style: none;
        }

        /* Custom scrollable areas - NO VISIBLE SCROLLBAR */
        .custom-scroll {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .custom-scroll::-webkit-scrollbar {
            width: 0px;
            height: 0px;
            display: none;
        }

        .custom-scroll::-webkit-scrollbar-track {
            display: none;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            display: none;
        }

        /* Ensure scrolling still works smoothly */
        html, body {
            scroll-behavior: smooth;
        }

        /* ========================================
           DASHBOARD ENHANCED CSS
           ======================================== */

        /* Custom animations */
        @keyframes float-gentle {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-5px); }
        }

        @keyframes slide-up {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes pulse-glow {
            0%, 100% { box-shadow: 0 0 20px rgba(59, 130, 246, 0.3); }
            50% { box-shadow: 0 0 30px rgba(59, 130, 246, 0.5); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        @keyframes bounce-in {
            0% { transform: scale(0.8); opacity: 0; }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); opacity: 1; }
        }

        /* Main container enhancement */
        .space-y-6 {
            animation: fade-in 0.8s ease-out;
        }

        /* Welcome card enhancement */
        .bg-gradient-to-r.from-blue-600.to-purple-600 {
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 25%, #8b5cf6 75%, #a855f7 100%);
            animation: slide-up 0.6s ease-out;
        }

        .bg-gradient-to-r.from-blue-600.to-purple-600::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.1;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
        }

        .bg-gradient-to-r.from-blue-600.to-purple-600:hover {
            transform: translateY(-1px);
            transition: all 0.3s ease;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Stats cards enhancement */
        .bg-white.rounded-lg.shadow-sm.p-6 {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
            animation: slide-up 0.8s ease-out;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .bg-white.rounded-lg.shadow-sm.p-6:hover {
            transform: translateY(-2px);
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Icon circles enhancement */
        .w-12.h-12.bg-blue-500.rounded-full,
        .w-12.h-12.bg-green-500.rounded-full,
        .w-12.h-12.bg-yellow-500.rounded-full,
        .w-12.h-12.bg-purple-500.rounded-full {
            transition: all 0.3s ease;
            animation: float-gentle 3s ease-in-out infinite;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .w-12.h-12.bg-blue-500.rounded-full:hover {
            transform: scale(1.1);
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .w-12.h-12.bg-green-500.rounded-full:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
        }

        .w-12.h-12.bg-yellow-500.rounded-full:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.5);
        }

        .w-12.h-12.bg-purple-500.rounded-full:hover {
            transform: scale(1.1);
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
        }

        /* Chart containers */
        .bg-white.rounded-lg.shadow-sm.p-6:has(canvas) {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Quick action cards - Enhanced dengan Glass Effect untuk Dark Mode */
        .border-dashed.border-gray-300 {
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.5) 0%, rgba(249, 250, 251, 0.8) 100%);
            backdrop-filter: blur(10px);
        }

        /* Glass Effect - Dark Mode Only untuk Quick Actions */
        .dark .quick-action-glass {
            background: rgba(31, 41, 55, 0.3) !important;
            backdrop-filter: blur(12px) !important;
            -webkit-backdrop-filter: blur(12px) !important;
            border: 1px solid rgba(255, 255, 255, 0.1) !important;
            box-shadow: 
                0 8px 32px 0 rgba(31, 38, 135, 0.2),
                inset 0 1px 0 0 rgba(255, 255, 255, 0.05) !important;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1) !important;
        }

        .dark .quick-action-glass:hover {
            background: rgba(31, 41, 55, 0.4) !important;
            backdrop-filter: blur(16px) !important;
            -webkit-backdrop-filter: blur(16px) !important;
            transform: translateY(-2px) !important;
            box-shadow: 
                0 12px 40px 0 rgba(31, 38, 135, 0.3),
                inset 0 1px 0 0 rgba(255, 255, 255, 0.1),
                0 0 0 1px rgba(255, 255, 255, 0.05) !important;
        }

        .dark .quick-action-glass.blue-hover:hover {
            border: 1px solid rgba(59, 130, 246, 0.4) !important;
            background: rgba(59, 130, 246, 0.08) !important;
            box-shadow: 
                0 12px 40px 0 rgba(59, 130, 246, 0.15),
                inset 0 1px 0 0 rgba(59, 130, 246, 0.1),
                0 0 0 1px rgba(59, 130, 246, 0.2) !important;
        }

        .dark .quick-action-glass.green-hover:hover {
            border: 1px solid rgba(16, 185, 129, 0.4) !important;
            background: rgba(16, 185, 129, 0.08) !important;
            box-shadow: 
                0 12px 40px 0 rgba(16, 185, 129, 0.15),
                inset 0 1px 0 0 rgba(16, 185, 129, 0.1),
                0 0 0 1px rgba(16, 185, 129, 0.2) !important;
        }

        .dark .quick-action-glass.yellow-hover:hover {
            border: 1px solid rgba(245, 158, 11, 0.4) !important;
            background: rgba(245, 158, 11, 0.08) !important;
            box-shadow: 
                0 12px 40px 0 rgba(245, 158, 11, 0.15),
                inset 0 1px 0 0 rgba(245, 158, 11, 0.1),
                0 0 0 1px rgba(245, 158, 11, 0.2) !important;
        }

        .dark .quick-action-glass.purple-hover:hover {
            border: 1px solid rgba(139, 92, 246, 0.4) !important;
            background: rgba(139, 92, 246, 0.08) !important;
            box-shadow: 
                0 12px 40px 0 rgba(139, 92, 246, 0.15),
                inset 0 1px 0 0 rgba(139, 92, 246, 0.1),
                0 0 0 1px rgba(139, 92, 246, 0.2) !important;
        }

        .dark .glass-icon {
            box-shadow: 
                0 8px 16px rgba(0, 0, 0, 0.3),
                0 0 0 1px rgba(255, 255, 255, 0.1) !important;
            backdrop-filter: blur(8px) !important;
        }

        .dark .glass-text {
            text-shadow: 0 0 8px rgba(255, 255, 255, 0.1) !important;
        }

        /* Light Mode Hover Effects - Tetap seperti semula */
        .hover\\:border-blue-500:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(147, 197, 253, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        }

        .hover\\:border-green-500:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(110, 231, 183, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
        }

        .hover\\:border-yellow-500:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(251, 191, 36, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.15);
        }

        .hover\\:border-purple-500:hover {
            transform: translateY(-2px);
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(196, 181, 253, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.15);
        }

        /* Responsive */
        @media (max-width: 768px) {
            /* Make sure mobile scrollbars are also hidden */
            html, body {
                overflow-x: hidden;
            }
            
            .dark .quick-action-glass {
                backdrop-filter: blur(8px) !important;
                -webkit-backdrop-filter: blur(8px) !important;
            }
            
            .dark .quick-action-glass:hover {
                transform: translateY(-1px) !important;
                backdrop-filter: blur(10px) !important;
                -webkit-backdrop-filter: blur(10px) !important;
            }
        }

        /* High contrast mode */
        @media (prefers-contrast: high) {
            /* No scrollbar styles needed since they're hidden */
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
            
            .dark .quick-action-glass,
            .dark .quick-action-glass:hover {
                transition: none !important;
                transform: none !important;
            }
        }

        /* ========================================
           ADDITIONAL STYLE IMPROVEMENTS
           ======================================== */

        /* Better overflow handling for scrollable areas */
        .scrollable-content {
            overflow-y: auto;
            overflow-x: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        .scrollable-content::-webkit-scrollbar {
            display: none;
        }

        /* Add subtle fade effect at edges for scrollable areas */
        .fade-edges {
            position: relative;
        }

        .fade-edges::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 10px;
            background: linear-gradient(to bottom, rgba(255, 255, 255, 0.8), transparent);
            pointer-events: none;
            z-index: 1;
        }

        .fade-edges::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            right: 0;
            height: 10px;
            background: linear-gradient(to top, rgba(255, 255, 255, 0.8), transparent);
            pointer-events: none;
            z-index: 1;
        }

        .dark .fade-edges::before {
            background: linear-gradient(to bottom, rgba(17, 24, 39, 0.8), transparent);
        }

        .dark .fade-edges::after {
            background: linear-gradient(to top, rgba(17, 24, 39, 0.8), transparent);
        }
    </style>

    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-blue-100">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <!-- Total Karyawan -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-blue-400/60 dark:border-blue-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 uppercase">Total Karyawan</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-400 dark:from-blue-300 dark:to-blue-100 bg-clip-text text-transparent">{{ $totalKaryawan ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Hadir Hari Ini -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-green-400/60 dark:border-green-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-green-400 to-green-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 uppercase">Hadir Hari Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-green-600 to-green-400 dark:from-green-300 dark:to-green-100 bg-clip-text text-transparent">{{ $totalAbsensiHariIni ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Timbangan Hari Ini -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-yellow-400/60 dark:border-yellow-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 uppercase">Timbangan Hari Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-yellow-600 to-yellow-400 dark:from-yellow-300 dark:to-yellow-100 bg-clip-text text-transparent">{{ $totalTimbanganHariIni ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Gaji Bulan Ini -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-purple-400/60 dark:border-purple-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-purple-400 to-purple-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-400 uppercase">Gaji Bulan Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-purple-400 dark:from-purple-300 dark:to-purple-100 bg-clip-text text-transparent">Rp {{ number_format($totalGajiBulanIni ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Activity Trend Chart -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-blue-400/60 dark:border-blue-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Tren Aktivitas 7 Hari</h3>
                        <div class="flex space-x-4 text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-gray-600 dark:text-gray-400">Absensi</span>
                            </div>
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                <span class="text-gray-600 dark:text-gray-400">Timbangan</span>
                            </div>
                        </div>
                    </div>
                    <div class="h-64">
                        <canvas id="activityChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Status Distribution -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-green-400/60 dark:border-green-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-green-400 to-green-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Status Absensi Bulan Ini</h3>
                    <div class="flex items-center justify-center h-48">
                        <canvas id="absensiChart"></canvas>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-gray-700 dark:text-white">Hadir</span>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-white">{{ $absensiStats['hadir'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                <span class="text-gray-700 dark:text-white">Izin</span>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-white">{{ $absensiStats['izin'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                <span class="text-gray-700 dark:text-white">Tidak Hadir</span>
                            </div>
                            <span class="font-medium text-gray-800 dark:text-white">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salary Trend Chart -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-purple-400/60 dark:border-purple-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-purple-400 to-purple-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
                
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-800 dark:text-white">Tren Gaji 6 Bulan Terakhir</h3>
                        <div class="text-sm text-gray-600 dark:text-gray-400">
                            Total: <span class="font-medium text-gray-800 dark:text-white">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="h-64">
                        <canvas id="gajiChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Top Performers -->
            <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-yellow-400/60 dark:border-yellow-500/50">
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>

                <div class="relative">
                    <h3 class="text-lg font-semibold text-gray-800 dark:text-white mb-4">Top Performer Bulan Ini</h3>
                    <div class="space-y-4 scrollable-content fade-edges max-h-64 overflow-y-auto">
                        @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                            <div class="flex items-center justify-between p-4 bg-gray-100/60 dark:bg-gray-700/30 backdrop-blur-sm rounded-lg border border-gray-300/60 dark:border-gray-600/40 hover:bg-gray-200/60 dark:hover:bg-gray-600/40 hover:border-gray-400/80 dark:hover:border-gray-500/60 transition-all duration-200">
                                <div class="flex items-center space-x-3">
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600 to-purple-600 rounded-full flex items-center justify-center text-white font-bold shadow-lg">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <p class="font-semibold text-gray-800 dark:text-white">{{ $karyawan->nama }}</p>
                                        <p class="text-sm text-gray-600 dark:text-gray-200">{{ $karyawan->total_hadir }} hari hadir</p>
                                    </div>
                                </div>
                                <span class="text-sm font-bold text-green-800 dark:text-green-100 bg-green-200/80 dark:bg-green-500/80 px-3 py-1.5 rounded-full border border-green-300/80 dark:border-green-400/60">
                                    {{ round(($karyawan->total_hadir / 30) * 100) }}%
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gray-200/60 dark:bg-gray-700/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-gray-300/60 dark:border-gray-600/30">
                                    <svg class="w-8 h-8 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-700 dark:text-white font-medium">Belum ada data performer</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Data akan muncul setelah ada aktivitas absensi</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-blue-400/60 dark:border-blue-500/50">
            <!-- Gradient Border Effect - Multi-color Theme -->
            <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-yellow-500 to-purple-500 rounded-lg"></div>
            <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
            
            <!-- Content -->
            <div class="relative">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
                    <a href="{{ route('karyawans.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-400/50 rounded-lg hover:border-blue-500 dark:hover:border-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 group quick-action-glass blue-hover">
                        <div class="w-12 h-12 bg-blue-600 dark:bg-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-700 dark:group-hover:bg-blue-600 transition-colors shadow-lg glass-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200 group-hover:text-blue-600 dark:group-hover:text-blue-300 text-center transition-colors glass-text">Tambah Karyawan</span>
                    </a>

                    <a href="{{ route('absensis.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-400/50 rounded-lg hover:border-green-500 dark:hover:border-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 transition-all duration-200 group quick-action-glass green-hover">
                        <div class="w-12 h-12 bg-green-600 dark:bg-green-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-green-700 dark:group-hover:bg-green-600 transition-colors shadow-lg glass-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200 group-hover:text-green-600 dark:group-hover:text-green-300 text-center transition-colors glass-text">Catat Absensi</span>
                    </a>

                    <a href="{{ route('timbangans.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-400/50 rounded-lg hover:border-yellow-500 dark:hover:border-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition-all duration-200 group quick-action-glass yellow-hover">
                        <div class="w-12 h-12 bg-yellow-600 dark:bg-yellow-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-yellow-700 dark:group-hover:bg-yellow-600 transition-colors shadow-lg glass-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200 group-hover:text-yellow-600 dark:group-hover:text-yellow-300 text-center transition-colors glass-text">Input Timbangan</span>
                    </a>

                    <a href="{{ route('gajis.create') }}" class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-400/50 rounded-lg hover:border-purple-500 dark:hover:border-purple-400 hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-all duration-200 group quick-action-glass purple-hover">
                        <div class="w-12 h-12 bg-purple-600 dark:bg-purple-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-purple-700 dark:group-hover:bg-purple-600 transition-colors shadow-lg glass-icon">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-bold text-gray-700 dark:text-gray-200 group-hover:text-purple-600 dark:group-hover:text-purple-300 text-center transition-colors glass-text">Hitung Gaji</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white/80 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-green-400/60 dark:border-green-500/50">
            <!-- Gradient Border Effect - Green to Blue Theme (Activity Colors) -->
            <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-blue-500 to-yellow-500 rounded-lg"></div>
            <div class="absolute inset-[2px] bg-white dark:bg-gray-900 rounded-lg"></div>
            
            <!-- Content -->
            <div class="relative">
                <h3 class="text-lg font-bold text-gray-800 dark:text-white mb-4">Aktivitas Terbaru</h3>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Recent Absensi -->
                    <div>
                        <h4 class="text-sm font-bold text-gray-600 dark:text-gray-200 mb-3 flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            Absensi Terbaru
                        </h4>
                        <div class="space-y-3 scrollable-content fade-edges max-h-48 overflow-y-auto">
                            @forelse($recentAbsensi->take(3) as $absensi)
                                <div class="flex items-center justify-between p-4 bg-gray-100/60 dark:bg-gray-700/30 backdrop-blur-sm rounded-lg border border-gray-300/60 dark:border-gray-600/40 hover:bg-gray-200/60 dark:hover:bg-gray-600/40 hover:border-gray-400/80 dark:hover:border-gray-500/60 transition-all duration-200">
                                    <span class="text-sm font-bold text-gray-800 dark:text-white">{{ $absensi->karyawan->nama }}</span>
                                    <span class="px-3 py-1.5 text-xs rounded-full font-bold
                                        {{ $absensi->hadir ? 'bg-green-200/80 dark:bg-green-500/80 text-green-800 dark:text-green-100 border border-green-300/80 dark:border-green-400/60' : 
                                        ($absensi->izin ? 'bg-yellow-200/80 dark:bg-yellow-500/80 text-yellow-800 dark:text-yellow-100 border border-yellow-300/80 dark:border-yellow-400/60' : 
                                        'bg-red-200/80 dark:bg-red-500/80 text-red-800 dark:text-red-100 border border-red-300/80 dark:border-red-400/60') }}">
                                        {{ $absensi->hadir ? 'Hadir' : ($absensi->izin ? 'Izin' : 'Tidak Hadir') }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <div class="w-12 h-12 mx-auto mb-3 bg-gray-200/60 dark:bg-gray-700/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-gray-300/60 dark:border-gray-600/30">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-200 text-sm font-semibold">Belum ada data absensi</p>
                                </div>
                            @endforelse
                        </div>
                    </div>

                    <!-- Recent Timbangan -->
                    <div>
                        <h4 class="text-sm font-bold text-gray-600 dark:text-gray-200 mb-3 flex items-center">
                            <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                            Timbangan Terbaru
                        </h4>
                        <div class="space-y-3 scrollable-content fade-edges max-h-48 overflow-y-auto">
                            @forelse($recentTimbangan->take(3) as $timbangan)
                                <div class="flex items-center justify-between p-4 bg-gray-100/60 dark:bg-gray-700/30 backdrop-blur-sm rounded-lg border border-gray-300/60 dark:border-gray-600/40 hover:bg-gray-200/60 dark:hover:bg-gray-600/40 hover:border-gray-400/80 dark:hover:border-gray-500/60 transition-all duration-200">
                                    <span class="text-sm font-bold text-gray-800 dark:text-white flex-1 mr-3">{{ $timbangan->karyawan->nama }}</span>
                                    <span class="text-xs text-gray-700 dark:text-gray-200 bg-gray-200/80 dark:bg-gray-600/40 px-3 py-1.5 rounded-full font-bold border border-gray-300/80 dark:border-gray-500/40 text-center whitespace-nowrap">
                                        {{ $timbangan->deskripsi_timbangan }}
                                    </span>
                                </div>
                            @empty
                                <div class="text-center py-8">
                                    <div class="w-12 h-12 mx-auto mb-3 bg-gray-200/60 dark:bg-gray-700/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-gray-300/60 dark:border-gray-600/30">
                                        <svg class="w-6 h-6 text-gray-500 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                        </svg>
                                    </div>
                                    <p class="text-gray-700 dark:text-gray-200 text-sm font-semibold">Belum ada data timbangan</p>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <script>
        // Configure Chart.js defaults
        Chart.defaults.font.family = 'Inter, system-ui, sans-serif';
        Chart.defaults.color = '#6B7280';
        Chart.defaults.plugins.legend.display = false;

        // Activity Trend Chart
        const activityCtx = document.getElementById('activityChart').getContext('2d');
        new Chart(activityCtx, {
            type: 'line',
            data: {
                labels: @json($tanggal7Hari),
                datasets: [{
                    label: 'Absensi',
                    data: @json($absensi7Hari),
                    borderColor: '#3B82F6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }, {
                    label: 'Timbangan',
                    data: @json($timbangan7Hari),
                    borderColor: '#F59E0B',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 6
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0, 0, 0, 0.05)' }
                    },
                    x: {
                        grid: { display: false }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        titleColor: '#1F2937',
                        bodyColor: '#1F2937',
                        borderColor: '#E5E7EB',
                        borderWidth: 1
                    }
                }
            }
        });

        // Absensi Status Chart
        const absensiCtx = document.getElementById('absensiChart').getContext('2d');
        new Chart(absensiCtx, {
            type: 'doughnut',
            data: {
                labels: ['Hadir', 'Izin', 'Tidak Hadir'],
                datasets: [{
                    data: [
                        {{ $absensiStats['hadir'] }},
                        {{ $absensiStats['izin'] }},
                        {{ $absensiStats['tidak_hadir'] }}
                    ],
                    backgroundColor: ['#10B981', '#F59E0B', '#EF4444'],
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        titleColor: '#1F2937',
                        bodyColor: '#1F2937',
                        borderColor: '#E5E7EB',
                        borderWidth: 1
                    }
                }
            }
        });

        // Salary Trend Chart
        const gajiCtx = document.getElementById('gajiChart').getContext('2d');
        new Chart(gajiCtx, {
            type: 'bar',
            data: {
                labels: @json($bulanLabels),
                datasets: [{
                    label: 'Total Gaji',
                    data: @json($gajiBulanan),
                    backgroundColor: '#8B5CF6',
                    borderRadius: 6,
                    borderSkipped: false
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                        grid: { color: 'rgba(0, 0, 0, 0.05)' },
                        ticks: {
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
                        grid: { display: false }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(255, 255, 255, 0.95)',
                        titleColor: '#1F2937',
                        bodyColor: '#1F2937',
                        borderColor: '#E5E7EB',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return 'Total Gaji: Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                            }
                        }
                    }
                }
            }
        });

        // Enhanced interactions
        document.addEventListener('DOMContentLoaded', function() {
            console.log('Dashboard TANPA scrollbar telah dimuat');
        });
    </script>
    @endpush
</x-app-layout>