<x-app-layout>
    @section('title', 'Dashboard')

    <!-- Enhanced CSS untuk Dashboard -->
    <style>
        /* ========================================
           DASHBOARD ENHANCED CSS - TAILWIND
           Tanpa mengubah struktur Laravel Blade
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

        /* ========================================
           GENERAL STYLING
           ======================================== */

        /* Main container enhancement */
        .space-y-6 {
            @apply relative;
            animation: fade-in 0.8s ease-out;
        }

        /* ========================================
           WELCOME CARD ENHANCEMENT
           ======================================== */

        /* Welcome card dengan enhanced gradient */
        .bg-gradient-to-r.from-blue-600.to-purple-600 {
            @apply relative overflow-hidden;
            background: linear-gradient(135deg, #2563eb 0%, #3b82f6 25%, #8b5cf6 75%, #a855f7 100%);
            animation: slide-up 0.6s ease-out;
        }

        /* Background pattern untuk welcome card */
        .bg-gradient-to-r.from-blue-600.to-purple-600::before {
            content: '';
            @apply absolute inset-0 opacity-10;
            background-image: 
                radial-gradient(circle at 20% 80%, rgba(255, 255, 255, 0.3) 0%, transparent 50%),
                radial-gradient(circle at 80% 20%, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
        }

        /* Welcome card hover effect */
        .bg-gradient-to-r.from-blue-600.to-purple-600:hover {
            @apply transform -translate-y-1;
            transition: all 0.3s ease;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.1);
        }

        /* Welcome text enhancement */
        .bg-gradient-to-r.from-blue-600.to-purple-600 h2 {
            @apply relative;
            text-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        /* ========================================
           STATS CARDS ENHANCEMENT
           ======================================== */

        /* Grid container untuk stats */
        .grid.grid-cols-1.md\\:grid-cols-2.xl\\:grid-cols-4 {
            @apply gap-6;
        }

        /* Base stats card styling */
        .bg-white.rounded-lg.shadow-sm.p-6 {
            @apply relative overflow-hidden transition-all duration-300;
            animation: slide-up 0.8s ease-out;
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        /* Stats card hover effects */
        .bg-white.rounded-lg.shadow-sm.p-6:hover {
            @apply transform -translate-y-2;
            box-shadow: 
                0 20px 25px -5px rgba(0, 0, 0, 0.1),
                0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        /* Border left colors dengan glow effect */
        .border-blue-500 {
            position: relative;
        }

        .border-blue-500::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #3b82f6, #1d4ed8);
            border-radius: 0 4px 4px 0;
            box-shadow: 0 0 10px rgba(59, 130, 246, 0.3);
        }

        .border-green-500::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #10b981, #059669);
            border-radius: 0 4px 4px 0;
            box-shadow: 0 0 10px rgba(16, 185, 129, 0.3);
        }

        .border-yellow-500::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #f59e0b, #d97706);
            border-radius: 0 4px 4px 0;
            box-shadow: 0 0 10px rgba(245, 158, 11, 0.3);
        }

        .border-purple-500::before {
            content: '';
            position: absolute;
            left: 0;
            top: 0;
            bottom: 0;
            width: 4px;
            background: linear-gradient(to bottom, #8b5cf6, #7c3aed);
            border-radius: 0 4px 4px 0;
            box-shadow: 0 0 10px rgba(139, 92, 246, 0.3);
        }

        /* Icon circles enhancement */
        .w-12.h-12.bg-blue-500.rounded-full,
        .w-12.h-12.bg-green-500.rounded-full,
        .w-12.h-12.bg-yellow-500.rounded-full,
        .w-12.h-12.bg-purple-500.rounded-full {
            @apply transition-all duration-300;
            animation: float-gentle 3s ease-in-out infinite;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .w-12.h-12.bg-blue-500.rounded-full:hover {
            @apply scale-110;
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .w-12.h-12.bg-green-500.rounded-full:hover {
            @apply scale-110;
            box-shadow: 0 0 20px rgba(16, 185, 129, 0.5);
        }

        .w-12.h-12.bg-yellow-500.rounded-full:hover {
            @apply scale-110;
            box-shadow: 0 0 20px rgba(245, 158, 11, 0.5);
        }

        .w-12.h-12.bg-purple-500.rounded-full:hover {
            @apply scale-110;
            box-shadow: 0 0 20px rgba(139, 92, 246, 0.5);
        }

        /* Stats number enhancement */
        .text-3xl.font-bold.text-gray-900 {
            @apply bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent;
            animation: bounce-in 1s ease-out 0.3s both;
        }

        .text-2xl.font-bold.text-gray-900 {
            @apply bg-gradient-to-r from-gray-900 to-gray-600 bg-clip-text text-transparent;
            animation: bounce-in 1s ease-out 0.3s both;
        }

        /* ========================================
           CHARTS SECTION ENHANCEMENT
           ======================================== */

        /* Charts grid container */
        .grid.grid-cols-1.lg\\:grid-cols-2 {
            @apply gap-8;
        }

        /* Chart containers */
        .bg-white.rounded-lg.shadow-sm.p-6:has(canvas) {
            @apply relative;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.95) 0%, rgba(249, 250, 251, 0.95) 100%);
            backdrop-filter: blur(20px);
            border: 1px solid rgba(255, 255, 255, 0.3);
        }

        /* Chart titles */
        .text-lg.font-semibold.text-gray-900 {
            @apply bg-gradient-to-r from-gray-900 to-gray-700 bg-clip-text text-transparent;
            position: relative;
        }

        .text-lg.font-semibold.text-gray-900::after {
            content: '';
            position: absolute;
            bottom: -4px;
            left: 0;
            width: 30px;
            height: 2px;
            background: linear-gradient(to right, #3b82f6, #8b5cf6);
            border-radius: 1px;
        }

        /* Legend dots enhancement */
        .w-3.h-3.bg-blue-500.rounded-full,
        .w-3.h-3.bg-yellow-500.rounded-full,
        .w-3.h-3.bg-green-500.rounded-full,
        .w-3.h-3.bg-red-500.rounded-full {
            @apply transition-all duration-300;
            animation: pulse-glow 3s ease-in-out infinite;
        }

        /* ========================================
           TOP PERFORMERS ENHANCEMENT
           ======================================== */

        /* Performer cards */
        .bg-gray-50.rounded-lg {
            @apply transition-all duration-300 hover:bg-gray-100;
            background: linear-gradient(135deg, rgba(249, 250, 251, 0.8) 0%, rgba(243, 244, 246, 0.8) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }

        .bg-gray-50.rounded-lg:hover {
            @apply transform -translate-y-1;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
        }

        /* Ranking badges */
        .w-10.h-10.bg-gradient-to-r.from-blue-500.to-purple-500 {
            @apply relative overflow-hidden;
            animation: bounce-in 0.8s ease-out;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .w-10.h-10.bg-gradient-to-r.from-blue-500.to-purple-500::before {
            content: '';
            @apply absolute inset-0;
            background: linear-gradient(45deg, rgba(255, 255, 255, 0.2) 0%, transparent 50%);
            animation: shimmer 2s ease-in-out infinite;
            background-size: 200% 200%;
        }

        /* Performance percentage badges */
        .text-green-600.bg-green-100 {
            @apply transition-all duration-300;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.1) 100%);
            border: 1px solid rgba(16, 185, 129, 0.2);
        }

        /* ========================================
           QUICK ACTIONS ENHANCEMENT
           ======================================== */

        /* Quick action cards */
        .border-dashed.border-gray-300 {
            @apply transition-all duration-300 relative overflow-hidden;
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.5) 0%, rgba(249, 250, 251, 0.8) 100%);
            backdrop-filter: blur(10px);
        }

        /* Hover effects untuk quick actions */
        .hover\\:border-blue-500:hover {
            @apply transform -translate-y-2;
            background: linear-gradient(135deg, rgba(59, 130, 246, 0.05) 0%, rgba(147, 197, 253, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(59, 130, 246, 0.15);
        }

        .hover\\:border-green-500:hover {
            @apply transform -translate-y-2;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.05) 0%, rgba(110, 231, 183, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(16, 185, 129, 0.15);
        }

        .hover\\:border-yellow-500:hover {
            @apply transform -translate-y-2;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.05) 0%, rgba(251, 191, 36, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(245, 158, 11, 0.15);
        }

        .hover\\:border-purple-500:hover {
            @apply transform -translate-y-2;
            background: linear-gradient(135deg, rgba(139, 92, 246, 0.05) 0%, rgba(196, 181, 253, 0.1) 100%);
            box-shadow: 0 10px 25px rgba(139, 92, 246, 0.15);
        }

        /* Quick action icon circles */
        .w-12.h-12.bg-blue-600.rounded-full,
        .w-12.h-12.bg-green-600.rounded-full,
        .w-12.h-12.bg-yellow-600.rounded-full,
        .w-12.h-12.bg-purple-600.rounded-full {
            @apply transition-all duration-300;
            animation: float-gentle 4s ease-in-out infinite;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
        }

        .group:hover .w-12.h-12.bg-blue-600.rounded-full {
            @apply scale-110;
            animation: pulse-glow 2s ease-in-out infinite;
        }

        .group:hover .w-12.h-12.bg-green-600.rounded-full {
            @apply scale-110;
            box-shadow: 0 0 20px rgba(22, 163, 74, 0.5);
        }

        .group:hover .w-12.h-12.bg-yellow-600.rounded-full {
            @apply scale-110;
            box-shadow: 0 0 20px rgba(202, 138, 4, 0.5);
        }

        .group:hover .w-12.h-12.bg-purple-600.rounded-full {
            @apply scale-110;
            box-shadow: 0 0 20px rgba(147, 51, 234, 0.5);
        }

        /* ========================================
           RECENT ACTIVITIES ENHANCEMENT
           ======================================== */

        /* Activity headers */
        .text-sm.font-medium.text-gray-700 {
            @apply relative;
            color: #374151;
        }

        .text-sm.font-medium.text-gray-700::after {
            content: '';
            position: absolute;
            bottom: -2px;
            left: 0;
            width: 20px;
            height: 1px;
            background: linear-gradient(to right, #6b7280, transparent);
        }

        /* Status badges enhancement */
        .bg-green-100.text-green-800 {
            @apply transition-all duration-300;
            background: linear-gradient(135deg, rgba(16, 185, 129, 0.1) 0%, rgba(5, 150, 105, 0.15) 100%);
            border: 1px solid rgba(16, 185, 129, 0.2);
            box-shadow: 0 2px 4px rgba(16, 185, 129, 0.1);
        }

        .bg-yellow-100.text-yellow-800 {
            @apply transition-all duration-300;
            background: linear-gradient(135deg, rgba(245, 158, 11, 0.1) 0%, rgba(217, 119, 6, 0.15) 100%);
            border: 1px solid rgba(245, 158, 11, 0.2);
            box-shadow: 0 2px 4px rgba(245, 158, 11, 0.1);
        }

        .bg-red-100.text-red-800 {
            @apply transition-all duration-300;
            background: linear-gradient(135deg, rgba(239, 68, 68, 0.1) 0%, rgba(220, 38, 38, 0.15) 100%);
            border: 1px solid rgba(239, 68, 68, 0.2);
            box-shadow: 0 2px 4px rgba(239, 68, 68, 0.1);
        }

        /* ========================================
           RESPONSIVE ENHANCEMENTS
           ======================================== */

        /* Mobile optimizations */
        @media (max-width: 768px) {
            .space-y-6 {
                @apply space-y-4;
            }
            
            .bg-gradient-to-r.from-blue-600.to-purple-600 {
                @apply p-4;
            }
            
            .bg-white.rounded-lg.shadow-sm.p-6 {
                @apply p-4;
            }
            
            .text-3xl.font-bold.text-gray-900 {
                @apply text-2xl;
            }
            
            .grid.grid-cols-1.md\\:grid-cols-2.xl\\:grid-cols-4 {
                @apply gap-4;
            }
            
            .grid.grid-cols-1.lg\\:grid-cols-2 {
                @apply gap-4;
            }
        }

        /* ========================================
           ACCESSIBILITY ENHANCEMENTS
           ======================================== */

        /* Focus states */
        a:focus-visible,
        button:focus-visible {
            @apply ring-2 ring-blue-500 ring-offset-2 outline-none;
        }

        /* High contrast mode */
        @media (prefers-contrast: high) {
            .bg-white.rounded-lg.shadow-sm.p-6 {
                @apply border-2 border-gray-800;
            }
            
            .bg-gradient-to-r.from-blue-600.to-purple-600 {
                @apply bg-blue-800;
            }
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            * {
                animation-duration: 0.01ms !important;
                animation-iteration-count: 1 !important;
                transition-duration: 0.01ms !important;
            }
        }
    </style>

    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-blue-100">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
        </div>

        <!-- Stats Cards - Improved Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Total Karyawan</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-blue-600 to-blue-400 bg-clip-text text-transparent">{{ $totalKaryawan ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-blue-500 to-blue-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Absensi Hari Ini -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Green Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-green-400 to-green-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Hadir Hari Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-green-600 to-green-400 bg-clip-text text-transparent">{{ $totalAbsensiHariIni ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-green-500 to-green-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Timbangan Hari Ini -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Yellow Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-yellow-500 via-yellow-400 to-yellow-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Timbangan Hari Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-yellow-600 to-yellow-400 bg-clip-text text-transparent">{{ $totalTimbanganHariIni ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-yellow-500 to-yellow-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Gaji Bulan Ini -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Yellow Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-purple-400 to-purple-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400 uppercase">Gaji Bulan Ini</p>
                        <p class="text-3xl font-bold bg-gradient-to-r from-purple-600 to-purple-400 bg-clip-text text-transparent">Rp {{ number_format($totalGajiBulanIni ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-12 h-12 bg-gradient-to-r from-purple-500 to-purple-400 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                             <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section - Improved Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Activity Trend Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Blue Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-blue-400 to-blue-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tren Aktivitas 7 Hari</h3>
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
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Green Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-green-400 to-green-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Status Absensi Bulan Ini</h3>
                    <div class="flex items-center justify-center h-48">
                        <canvas id="absensiChart"></canvas>
                    </div>
                    <div class="mt-4 space-y-2">
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                                <span class="text-gray-900 dark:text-white">Hadir</span>
                            </div>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $absensiStats['hadir'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                                <span class="text-gray-900 dark:text-white">Izin</span>
                            </div>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $absensiStats['izin'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm">
                            <div class="flex items-center">
                                <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                                <span class="text-gray-900 dark:text-white">Tidak Hadir</span>
                            </div>
                            <span class="font-medium text-gray-900 dark:text-white">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Salary Trend Chart -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Purple Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-purple-500 via-purple-400 to-purple-300 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative">
                    <div class="flex items-center justify-between mb-4">
                        <h3 class="text-lg font-semibold text-gray-900 dark:text-white">Tren Gaji 6 Bulan Terakhir</h3>
                        <div class="text-sm text-gray-500 dark:text-gray-400">
                            Total: <span class="font-medium text-gray-900 dark:text-white">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="h-64">
                        <canvas id="gajiChart"></canvas>
                    </div>
                </div>
            </div>

            <!-- Top Performers - Transparent Design -->
            <div class="bg-white/10 dark:bg-gray-800/10 backdrop-blur-sm rounded-lg shadow-sm p-6 relative overflow-hidden border border-white/20 dark:border-gray-700/30">
                <!-- Subtle Gradient Border Effect -->
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500/20 via-purple-500/20 to-blue-400/20 rounded-lg"></div>
                <div class="absolute inset-[1px] bg-white/5 dark:bg-gray-800/5 backdrop-blur-sm rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100 mb-4">Top Performer Bulan Ini</h3>
                    <div class="space-y-4">
                        @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                            <div class="flex items-center justify-between p-4 bg-white/20 dark:bg-gray-700/20 backdrop-blur-sm rounded-lg border border-white/30 dark:border-gray-600/30 hover:bg-white/30 dark:hover:bg-gray-700/30 transition-all duration-200">
                                <div class="flex items-center space-x-3">
                                    <!-- Ranking Badge with Glass Effect -->
                                    <div class="w-10 h-10 bg-gradient-to-r from-blue-600/80 to-purple-600/80 backdrop-blur-sm rounded-full flex items-center justify-center text-white font-bold shadow-lg border border-white/20">
                                        {{ $index + 1 }}
                                    </div>
                                    <div>
                                        <!-- Employee Name - High Contrast for Both Modes -->
                                        <p class="font-semibold text-gray-900 dark:text-white">
                                            {{ $karyawan->nama }}
                                        </p>
                                        <!-- Attendance Info - Good Contrast -->
                                        <p class="text-sm text-gray-700 dark:text-gray-200">
                                            {{ $karyawan->total_hadir }} hari hadir
                                        </p>
                                    </div>
                                </div>
                                <!-- Percentage Badge - Glass Effect -->
                                <span class="text-sm font-bold text-purple-800 dark:text-purple-200 bg-purple-100/60 dark:bg-purple-800/30 backdrop-blur-sm px-3 py-1.5 rounded-full border border-green-200/60 dark:border-green-700/40">
                                    {{ round(($karyawan->total_hadir / 30) * 100) }}%
                                </span>
                            </div>
                        @empty
                            <!-- Empty State with Glass Effect -->
                            <div class="text-center py-12">
                                <div class="w-16 h-16 mx-auto mb-4 bg-white/20 dark:bg-gray-700/20 backdrop-blur-sm rounded-full flex items-center justify-center border border-white/30 dark:border-gray-600/30">
                                    <svg class="w-8 h-8 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-800 dark:text-gray-200 font-medium">Belum ada data performer</p>
                                <p class="text-sm text-gray-600 dark:text-gray-300 mt-1">Data akan muncul setelah ada aktivitas absensi</p>
                            </div>
                        @endforelse
                    </div>
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Multi-color Theme -->
                <div class="absolute inset-0 bg-gradient-to-r from-blue-500 via-yellow-500 to-purple-500 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100 mb-4 select-none" style="text-shadow: 0 1px 2px rgba(0,0,0,0.1);">Aksi Cepat</h3>
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Tambah Karyawan -->
                        <a href="{{ route('karyawans.create') }}" 
                        class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg hover:border-blue-500 dark:hover:border-blue-400 hover:bg-blue-50 dark:hover:bg-blue-900/20 transition-all duration-200 group select-none">
                            <div class="w-12 h-12 bg-blue-600 dark:bg-blue-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-700 dark:group-hover:bg-blue-600 transition-colors shadow-lg">
                                <!-- ICON PLUS untuk Tambah Karyawan -->
                                <svg class="w-6 h-6 text-white select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z "></path>
                                </svg>
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300 group-hover:text-blue-700 dark:group-hover:text-blue-300 text-center transition-colors select-none" 
                                style="text-shadow: 0 1px 2px rgba(0,0,0,0.1); -webkit-text-stroke: 0.5px rgba(0,0,0,0.1);">
                                Tambah Karyawan
                            </span>
                        </a>

                        <!-- Catat Absensi -->
                        <a href="{{ route('absensis.create') }}" 
                        class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg hover:border-green-500 dark:hover:border-green-400 hover:bg-green-50 dark:hover:bg-green-900/20 transition-all duration-200 group select-none">
                            <div class="w-12 h-12 bg-green-600 dark:bg-green-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-green-700 dark:group-hover:bg-green-600 transition-colors shadow-lg">
                                <!-- ICON CHECKMARK untuk Absensi -->
                                <svg class="w-6 h-6 text-white select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300 group-hover:text-green-700 dark:group-hover:text-green-300 text-center transition-colors select-none" 
                                style="text-shadow: 0 1px 2px rgba(0,0,0,0.1); -webkit-text-stroke: 0.5px rgba(0,0,0,0.1);">
                                Catat Absensi
                            </span>
                        </a>

                        <!-- Input Timbangan -->
                        <a href="{{ route('timbangans.create') }}" 
                        class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg hover:border-yellow-500 dark:hover:border-yellow-400 hover:bg-yellow-50 dark:hover:bg-yellow-900/20 transition-all duration-200 group select-none">
                            <div class="w-12 h-12 bg-yellow-600 dark:bg-yellow-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-yellow-700 dark:group-hover:bg-yellow-600 transition-colors shadow-lg">
                                <!-- ICON SCALE untuk Timbangan -->
                                <svg class="w-6 h-6 text-white select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300 group-hover:text-yellow-700 dark:group-hover:text-yellow-300 text-center transition-colors select-none" 
                                style="text-shadow: 0 1px 2px rgba(0,0,0,0.1); -webkit-text-stroke: 0.5px rgba(0,0,0,0.1);">
                                Input Timbangan
                            </span>
                        </a>

                        <!-- Hitung Gaji -->
                        <a href="{{ route('gajis.create') }}" 
                        class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 dark:border-gray-600 rounded-lg hover:border-purple-500 dark:hover:border-purple-400 hover:bg-purple-50 dark:hover:bg-purple-900/20 transition-all duration-200 group select-none">
                            <div class="w-12 h-12 bg-purple-600 dark:bg-purple-500 rounded-full flex items-center justify-center mb-3 group-hover:bg-purple-700 dark:group-hover:bg-purple-600 transition-colors shadow-lg">
                                <!-- ICON MONEY untuk Gaji -->
                                <svg class="w-6 h-6 text-white select-none pointer-events-none" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                            <span class="text-sm font-bold text-gray-700 dark:text-gray-300 group-hover:text-purple-700 dark:group-hover:text-purple-300 text-center transition-colors select-none" 
                                style="text-shadow: 0 1px 2px rgba(0,0,0,0.1); -webkit-text-stroke: 0.5px rgba(0,0,0,0.1);">
                                Hitung Gaji
                            </span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Recent Activities -->
            <div class="bg-white dark:bg-gray-800 rounded-lg shadow-sm p-6 relative overflow-hidden border-2 border-transparent bg-clip-padding">
                <!-- Gradient Border Effect - Green to Yellow Theme (Activity Colors) -->
                <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-blue-500 to-yellow-500 rounded-lg"></div>
                <div class="absolute inset-[2px] bg-white dark:bg-gray-800 rounded-lg"></div>
                
                <!-- Content -->
                <div class="relative">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-gray-50 mb-4">Aktivitas Terbaru</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <!-- Recent Absensi -->
                        <div>
                            <h4 class="text-sm font-bold text-gray-800 dark:text-gray-200 mb-3 flex items-center">
                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                Absensi Terbaru
                            </h4>
                            <div class="space-y-3">
                                @forelse($recentAbsensi->take(3) as $absensi)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-750 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <span class="text-sm font-bold text-gray-900 dark:text-gray-50">{{ $absensi->karyawan->nama }}</span>
                                        <span class="px-3 py-1.5 text-xs rounded-full font-bold
                                            {{ $absensi->hadir ? 'bg-green-100 dark:bg-green-800 text-green-900 dark:text-green-100 border border-green-300 dark:border-green-600' : 
                                            ($absensi->izin ? 'bg-yellow-100 dark:bg-yellow-800 text-yellow-900 dark:text-yellow-100 border border-yellow-300 dark:border-yellow-600' : 
                                            'bg-red-100 dark:bg-red-800 text-red-900 dark:text-red-100 border border-red-300 dark:border-red-600') }}">
                                            {{ $absensi->hadir ? 'Hadir' : ($absensi->izin ? 'Izin' : 'Tidak Hadir') }}
                                        </span>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <div class="w-12 h-12 mx-auto mb-3 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-700 dark:text-gray-300 text-sm font-semibold">Belum ada data absensi</p>
                                    </div>
                                @endforelse
                            </div>
                        </div>

                        <!-- Recent Timbangan -->
                        <div>
                            <h4 class="text-sm font-bold text-gray-800 dark:text-gray-200 mb-3 flex items-center">
                                <div class="w-2 h-2 bg-yellow-500 rounded-full mr-2"></div>
                                Timbangan Terbaru
                            </h4>
                            <div class="space-y-3">
                                @forelse($recentTimbangan->take(3) as $timbangan)
                                    <div class="flex items-center justify-between p-4 bg-gray-50 dark:bg-gray-750 rounded-lg border border-gray-200 dark:border-gray-600">
                                        <span class="text-sm font-bold text-gray-900 dark:text-gray-50 flex-1 mr-3">{{ $timbangan->karyawan->nama }}</span>
                                        <span class="text-xs text-gray-800 dark:text-gray-200 bg-gray-200 dark:bg-gray-600 px-3 py-1.5 rounded-full font-bold border border-gray-300 dark:border-gray-500 text-center whitespace-nowrap">
                                            {{ $timbangan->deskripsi_timbangan }}
                                        </span>
                                    </div>
                                @empty
                                    <div class="text-center py-8">
                                        <div class="w-12 h-12 mx-auto mb-3 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center">
                                            <svg class="w-6 h-6 text-gray-500 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                            </svg>
                                        </div>
                                        <p class="text-gray-700 dark:text-gray-300 text-sm font-semibold">Belum ada data timbangan</p>
                                    </div>
                                @endforelse
                            </div>
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
            // Add staggered animation to stats cards
            const statsCards = document.querySelectorAll('.border-l-4');
            statsCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
            });

            // Add staggered animation to chart containers
            const chartContainers = document.querySelectorAll('.bg-white.rounded-lg.shadow-sm.p-6:has(canvas)');
            chartContainers.forEach((container, index) => {
                container.style.animationDelay = `${0.4 + index * 0.1}s`;
            });

            // Add click ripple effect to quick action cards
            const quickActions = document.querySelectorAll('.border-dashed');
            quickActions.forEach(action => {
                action.addEventListener('click', function(e) {
                    const ripple = document.createElement('span');
                    ripple.style.cssText = `
                        position: absolute;
                        border-radius: 50%;
                        background: rgba(59, 130, 246, 0.3);
                        transform: scale(0);
                        animation: ripple 0.6s linear;
                        pointer-events: none;
                    `;
                    
                    const rect = this.getBoundingClientRect();
                    const size = Math.max(rect.width, rect.height);
                    ripple.style.width = ripple.style.height = size + 'px';
                    ripple.style.left = e.clientX - rect.left - size / 2 + 'px';
                    ripple.style.top = e.clientY - rect.top - size / 2 + 'px';
                    
                    this.appendChild(ripple);
                    setTimeout(() => ripple.remove(), 600);
                });
            });
        });

        // Add ripple animation keyframes
        const rippleStyle = document.createElement('style');
        rippleStyle.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(rippleStyle);
    </script>
    @endpush
</x-app-layout>