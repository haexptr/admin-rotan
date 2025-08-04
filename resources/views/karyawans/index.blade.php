<x-app-layout>
    @section('title', 'Employee Overview')

    <style>
        /* ========================================
           SOPHISTICATED ANIMATIONS & EFFECTS
           ======================================== */
        
        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes slideIn {
            from { opacity: 0; transform: translateX(-10px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes gentleFloat {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-2px); }
        }

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out;
        }

        .animate-float {
            animation: gentleFloat 3s ease-in-out infinite;
        }

        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        /* Professional scrollbar */
        .custom-scroll::-webkit-scrollbar {
            width: 6px;
            height: 6px;
        }

        .custom-scroll::-webkit-scrollbar-track {
            background: transparent;
        }

        .custom-scroll::-webkit-scrollbar-thumb {
            background: #d1d5db;
            border-radius: 3px;
        }

        .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }

        .dark .custom-scroll::-webkit-scrollbar-thumb {
            background: #4b5563;
        }

        .dark .custom-scroll::-webkit-scrollbar-thumb:hover {
            background: #6b7280;
        }

        /* Glassmorphism effect */
        .glass-card {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Professional hover effects */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }

        /* Font smoothing */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Professional table hover */
        .table-row {
            transition: all 0.2s ease;
        }

        .table-row:hover {
            background-color: rgba(0, 0, 0, 0.02);
        }

        .dark .table-row:hover {
            background-color: rgba(255, 255, 255, 0.03);
        }

        /* Search input enhancement */
        .search-input {
            transition: all 0.3s ease;
        }

        .search-input:focus {
            transform: scale(1.02);
        }

        /* Button enhancements */
        .btn-sophisticated {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-sophisticated::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn-sophisticated:hover::before {
            left: 100%;
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in,
            .animate-float,
            .animate-shimmer {
                animation: none;
            }
        }
    </style>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-7xl mx-auto p-6 space-y-8 animate-fade-in-up">
            
            <!-- Sophisticated Header -->
            <div class="relative">
                <div class="flex items-center justify-between">
                    <div class="space-y-3">
                        <div class="flex items-center space-x-4">
                            <div class="w-12 h-12 bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-200 dark:to-gray-400 rounded-full flex items-center justify-center shadow-lg animate-float">
                                <svg class="w-6 h-6 text-white dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z"></path>
                                </svg>
                            </div>
                            <div>
                                <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Data Karyawan</h1>
                                <p class="text-gray-600 dark:text-gray-300 font-medium">Kelola data karyawan dengan sistem terintegrasi</p>
                            </div>
                        </div>
                        <div class="w-24 h-1 bg-gradient-to-r from-gray-600 to-gray-400 dark:from-gray-400 dark:to-gray-200 rounded-full"></div>
                    </div>
                    
                    <div class="flex items-center space-x-4">
                        <!-- Export Button -->
                        <a href="{{ route('karyawans.export') }}" 
                           class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-white/80 dark:bg-gray-800/80 glass-card border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-300 hover-lift">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export Excel
                        </a>

                        <a href="{{ route('karyawans.create') }}" 
                           class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-gray-900 dark:bg-gray-100 dark:text-gray-900 rounded-xl hover:shadow-lg transition-all duration-300 hover-lift">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                            Tambah Karyawan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Sophisticated Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6">
                <!-- Total Employees -->
                <div class="group bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500 hover-lift animate-slide-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['total_employees'] ?? 0 }}</div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Karyawan</p>
                    </div>
                </div>

                <!-- Active Employees -->
                <div class="group bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500 hover-lift animate-slide-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                                <circle cx="12" cy="10" r="3"></circle>
                                <path d="M7 20.662V19a2 2 0 0 1 2-2h6a2 2 0 0 1 2 2v1.662"></path>
                            </svg>
                        </div>
                        <div class="w-2 h-2 bg-emerald-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ $stats['active_employees'] ?? 0 }}</div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Karyawan Aktif</p>
                    </div>
                </div>

                <!-- Total Weight In -->
                <div class="group bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500 hover-lift animate-slide-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 8h14M5 8a2 2 0 110-4h14a2 2 0 110 4M5 8v10a2 2 0 002 2h10a2 2 0 002-2V8m-9 4h4"></path>
                                <path d="M16 3v5l2-1 2 1V3"></path>
                                <path d="M9 12v.01"></path>
                                <path d="M15 12v.01"></path>
                                <path d="M9 16v.01"></path>
                                <path d="M15 16v.01"></path>
                                <path d="M7 16v.01"></path>
                                <path d="M17 16v.01"></path>
                            </svg>
                        </div>
                        <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_weight_in'] ?? 0, 0, ',', '.') }}</div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Berat Masuk (Kg)</p>
                    </div>
                </div>

                <!-- Total Weight Out -->
                <div class="group bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500 hover-lift animate-slide-in">
                    <div class="flex items-center justify-between mb-4">
                        <div class="p-3 bg-gray-100 dark:bg-gray-700 rounded-xl group-hover:scale-110 transition-transform duration-300">
                            <svg class="w-6 h-6 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16.5V7a1 1 0 00-1-1H4a1 1 0 00-1 1v9.5M2 7h2m0 0h4m0 0h6m2 0h2M9 7v4m6-4v4"></path>
                                <path d="M14 5V2a1 1 0 0 0-1-1h-2a1 1 0 0 0-1 1v3"></path>
                                <path d="M16 7h2a2 2 0 0 1 2 2v6a2 2 0 0 1-2 2h-2"></path>
                                <path d="M16 11h4"></path>
                            </svg>
                        </div>
                        <div class="w-2 h-2 bg-amber-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-2">
                        <div class="text-3xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_weight_out'] ?? 0, 0, ',', '.') }}</div>
                        <p class="text-sm font-medium text-gray-600 dark:text-gray-300">Total Berat Keluar (Kg)</p>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('karyawan_success'))
                <div class="bg-emerald-50/80 dark:bg-emerald-900/20 glass-card border border-emerald-200 dark:border-emerald-800 text-emerald-700 dark:text-emerald-200 px-6 py-4 rounded-xl flex items-center space-x-3 transition-all duration-300 animate-slide-in">
                    <div class="p-1 bg-emerald-100 dark:bg-emerald-800 rounded-full">
                        <svg class="w-4 h-4 text-emerald-600 dark:text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <span class="font-semibold">{{ session('karyawan_success') }}</span>
                    <button onclick="this.parentElement.remove()" class="ml-auto text-emerald-600 dark:text-emerald-400 hover:text-emerald-800 dark:hover:text-emerald-200 transition-colors duration-200">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                        </svg>
                    </button>
                </div>
            @endif

            <!-- Sophisticated Table Card -->
            <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden">
                <!-- Enhanced Header -->
                <div class="p-6 border-b border-gray-200/50 dark:border-gray-700/50">
                    <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                        <div class="space-y-2">
                            <div class="flex items-center space-x-3">
                                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                                        <path d="M8 10h.01"></path>
                                        <path d="M8 14h.01"></path>
                                        <path d="M16 10h.01"></path>
                                        <path d="M16 14h.01"></path>
                                    </svg>
                                </div>
                                <h2 class="text-xl font-bold text-gray-900 dark:text-white">Data Karyawan</h2>
                            </div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">Kelola informasi karyawan perusahaan dengan sistem terintegrasi</p>
                        </div>
                        
                        <!-- Enhanced Search Box -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="h-5 w-5 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="searchEmployee" 
                                   placeholder="Cari karyawan..." 
                                   class="search-input pl-12 pr-4 py-3 border border-gray-200 dark:border-gray-600 rounded-xl text-sm bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-gray-500 focus:border-transparent transition-all duration-300 w-full lg:w-80 font-medium">
                        </div>
                    </div>
                </div>

                <!-- Enhanced Table -->
                <div class="overflow-x-auto custom-scroll">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-200/50 dark:border-gray-700/50">
                                <th class="text-left py-4 px-6 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Karyawan</th>
                                <th class="text-left py-4 px-6 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Alamat</th>
                                <th class="text-left py-4 px-6 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. Telepon</th>
                                <th class="text-left py-4 px-6 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Berat Masuk</th>
                                <th class="text-left py-4 px-6 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Berat Keluar</th>
                                <th class="text-left py-4 px-6 text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100/50 dark:divide-gray-700/50">
                            @forelse($karyawans ?? [] as $index => $karyawan)
                                <tr class="table-row employee-row">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-4">
                                            <div class="flex-shrink-0">
                                                <div class="h-12 w-12 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 dark:from-gray-300 dark:to-gray-500 flex items-center justify-center shadow-lg animate-float">
                                                    <span class="text-sm font-bold text-white dark:text-gray-900 tracking-wide">
                                                        {{ strtoupper(substr($karyawan->nama ?? 'N/A', 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="space-y-1">
                                                <div class="text-sm font-bold text-gray-900 dark:text-white employee-name tracking-wide">{{ $karyawan->nama ?? 'N/A' }}</div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400 font-medium">ID: {{ $karyawan->id_karyawan ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-gray-100">{{ Str::limit($karyawan->alamat ?? 'N/A', 40) }}</td>
                                    <td class="py-4 px-6 text-sm font-medium text-gray-900 dark:text-gray-100">{{ $karyawan->no_telp ?? 'N/A' }}</td>
                                    <td class="py-4 px-6 text-sm">
                                        @if(($karyawan->memuat_timbangan_in ?? 0) > 0)
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 border border-gray-200 dark:border-gray-600">
                                                {{ number_format($karyawan->memuat_timbangan_in, 0, ',', '.') }} Kg
                                            </span>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 font-medium">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-sm">
                                        @if(($karyawan->memuat_timbangan_out ?? 0) > 0)
                                            <span class="inline-flex items-center px-3 py-1.5 rounded-lg text-xs font-bold bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 border border-gray-200 dark:border-gray-600">
                                                {{ number_format($karyawan->memuat_timbangan_out, 0, ',', '.') }} Kg
                                            </span>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500 font-medium">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center space-x-3">
                                            <a href="{{ route('karyawans.show', $karyawan->id_karyawan ?? '') }}" 
                                               class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 text-sm font-bold transition-colors duration-200 hover:underline">Lihat</a>
                                            <a href="{{ route('karyawans.edit', $karyawan->id_karyawan ?? '') }}" 
                                               class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 text-sm font-bold transition-colors duration-200 hover:underline">Edit</a>
                                            <form action="{{ route('karyawans.destroy', $karyawan->id_karyawan ?? '') }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" 
                                                        class="text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-200 text-sm font-bold transition-colors duration-200 hover:underline">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-16">
                                        <div class="space-y-4">
                                            <div class="w-16 h-16 mx-auto bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center border-2 border-gray-200 dark:border-gray-600">
                                                <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                </svg>
                                            </div>
                                            <div class="space-y-2">
                                                <h3 class="text-lg font-bold text-gray-900 dark:text-gray-100">Belum ada karyawan</h3>
                                                <p class="text-sm text-gray-500 dark:text-gray-400 font-medium">Mulai dengan menambahkan karyawan pertama Anda.</p>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            @if(isset($karyawans) && $karyawans->hasPages())
                <div class="flex justify-center">
                    <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 p-2">
                        {{ $karyawans->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchEmployee');
            const tableRows = document.querySelectorAll('.employee-row');
            let searchTimeout;

            // Enhanced search with sophisticated debouncing
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    const searchTerm = this.value.toLowerCase().trim();
                    
                    // Add loading state
                    this.style.opacity = '0.7';
                    
                    searchTimeout = setTimeout(() => {
                        let visibleCount = 0;
                        
                        tableRows.forEach((row, index) => {
                            const employeeName = row.querySelector('.employee-name')?.textContent.toLowerCase() || '';
                            const employeeAddress = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                            const employeePhone = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                            
                            const isVisible = !searchTerm || 
                                employeeName.includes(searchTerm) || 
                                employeeAddress.includes(searchTerm) || 
                                employeePhone.includes(searchTerm);
                            
                            if (isVisible) {
                                row.style.display = '';
                                row.style.animationDelay = `${index * 50}ms`;
                                row.classList.add('animate-slide-in');
                                visibleCount++;
                            } else {
                                row.style.display = 'none';
                                row.classList.remove('animate-slide-in');
                            }
                        });
                        
                        // Remove loading state
                        this.style.opacity = '1';
                    }, 300);
                });
            }

            // Enhanced delete confirmation with sophisticated styling
            const deleteButtons = document.querySelectorAll('form[action*="destroy"] button[type="submit"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const form = this.closest('form');
                    const employeeRow = this.closest('tr');
                    const employeeName = employeeRow?.querySelector('.employee-name')?.textContent || 'karyawan ini';
                    
                    // Create sophisticated confirmation dialog
                    const result = confirm(`⚠️ Konfirmasi Penghapusan\n\nYakin ingin menghapus karyawan "${employeeName}"?\n\nTindakan ini tidak dapat dibatalkan.`);
                    
                    if (result && form) {
                        // Add loading state before submit
                        this.innerHTML = `
                            <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menghapus...
                        `;
                        this.disabled = true;
                        
                        setTimeout(() => {
                            form.submit();
                        }, 500);
                    }
                });
            });

            // Sophisticated intersection observer for animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-in');
                    }
                });
            }, observerOptions);

            // Observe table rows for staggered animations
            tableRows.forEach((row, index) => {
                row.style.animationDelay = `${index * 100}ms`;
                observer.observe(row);
            });

            console.log('🎨 Sophisticated Karyawan Index Loaded!');
        });
    </script>
</x-app-layout>