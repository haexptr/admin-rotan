<x-app-layout>
    @section('title', 'Dashboard')

    <style>
        /* ========================================
           MINIMAL CSS - JUST ANIMATIONS & FIXES
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

        .animate-fade-in-up {
            animation: fadeInUp 0.8s ease-out;
        }

        .animate-slide-in {
            animation: slideIn 0.5s ease-out;
        }

        .animate-float {
            animation: gentleFloat 3s ease-in-out infinite;
        }

        /* Elegant scrollbar */
        .custom-scroll::-webkit-scrollbar {
            width: 5px;
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

        /* Chart containers - perfect circles */
        .chart-container {
            position: relative;
            width: 100%;
            height: 16rem;
        }

        .doughnut-container {
            position: relative;
            width: 12rem;
            height: 12rem;
            margin: 0 auto;
        }

        /* Font smoothing for crisp text */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Subtle glassmorphism effect */
        .glass-card {
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in,
            .animate-float {
                animation: none;
            }
        }
    </style>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="space-y-8 animate-fade-in-up">
            
            <!-- Elegant Welcome Card -->
            <div class="relative overflow-hidden">
                <div class="absolute inset-0 bg-gradient-to-r from-gray-900 via-gray-800 to-gray-900 dark:from-gray-100 dark:via-white dark:to-gray-100"></div>
                <div class="relative bg-gray-900/95 dark:bg-white/95 glass-card rounded-2xl p-8 shadow-2xl border border-gray-800/20 dark:border-gray-200/20">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-white/10 dark:bg-gray-900/10 rounded-full flex items-center justify-center animate-float">
                            <svg class="w-8 h-8 text-white dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-white dark:text-gray-900 mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
                            <p class="text-gray-300 dark:text-gray-600 font-medium">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sophisticated Dashboard Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-2 xl:grid-cols-3 gap-8">
                
                <!-- Absensi Terbaru - Refined -->
                <div class="group bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500 animate-slide-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Absensi Terbaru</h3>
                        <div class="w-3 h-3 bg-emerald-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-4 custom-scroll max-h-72 overflow-y-auto">
                        @forelse($recentAbsensi->take(3) as $absensi)
                            <div class="group/item flex items-center justify-between p-4 bg-gray-50/70 dark:bg-gray-700/70 glass-card rounded-lg border border-gray-100/60 dark:border-gray-600/60 hover:bg-gray-100/80 dark:hover:bg-gray-600/80 hover:shadow-md transition-all duration-300 animate-slide-in">
                                <div class="flex items-center space-x-3">
                                    <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full"></div>
                                    <span class="text-gray-900 dark:text-white font-semibold tracking-wide">{{ $absensi->karyawan->nama }}</span>
                                </div>
                                <span class="px-4 py-2 text-xs font-bold rounded-lg border transition-all duration-200
                                    {{ $absensi->hadir ? 'bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 border-emerald-200 dark:border-emerald-700' : 
                                    ($absensi->izin ? 'bg-amber-50 dark:bg-amber-900/30 text-amber-700 dark:text-amber-300 border-amber-200 dark:border-amber-700' : 
                                    'bg-rose-50 dark:bg-rose-900/30 text-rose-700 dark:text-rose-300 border-rose-200 dark:border-rose-700') }}">
                                    {{ $absensi->hadir ? 'Hadir' : ($absensi->izin ? 'Izin' : 'Tidak Hadir') }}
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center border-2 border-gray-200 dark:border-gray-600">
                                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada data absensi</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Tren Aktivitas 7 Hari - Sophisticated -->
                <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Tren Aktivitas 7 Hari</h3>
                        <div class="flex items-center space-x-4 text-sm font-medium">
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

                <!-- Tren Gaji - Elegant -->
                <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Tren Gaji 6 Bulan</h3>
                        <div class="text-sm font-medium text-gray-600 dark:text-gray-300">
                            Total: <span class="font-bold text-gray-900 dark:text-white">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</span>
                        </div>
                    </div>
                    <div class="chart-container">
                        <canvas id="gajiChart"></canvas>
                    </div>
                </div>

                <!-- Timbangan Terbaru - Refined -->
                <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500 animate-slide-in">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-xl font-bold text-gray-900 dark:text-white">Timbangan Terbaru</h3>
                        <div class="w-3 h-3 bg-amber-500 rounded-full animate-pulse"></div>
                    </div>
                    <div class="space-y-4 custom-scroll max-h-72 overflow-y-auto">
                        @forelse($recentTimbangan->take(3) as $timbangan)
                            <div class="flex items-center justify-between p-4 bg-gray-50/70 dark:bg-gray-700/70 glass-card rounded-lg border border-gray-100/60 dark:border-gray-600/60 hover:bg-gray-100/80 dark:hover:bg-gray-600/80 hover:shadow-md transition-all duration-300 animate-slide-in">
                                <div class="flex items-center space-x-3 flex-1">
                                    <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full"></div>
                                    <span class="text-gray-900 dark:text-white font-semibold tracking-wide">{{ $timbangan->karyawan->nama }}</span>
                                </div>
                                <span class="text-xs font-bold text-gray-600 dark:text-gray-300 bg-gray-100/80 dark:bg-gray-600/80 px-3 py-2 rounded-lg border border-gray-200 dark:border-gray-500">
                                    {{ $timbangan->deskripsi_timbangan }}
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-12">
                                <div class="w-16 h-16 mx-auto mb-4 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center border-2 border-gray-200 dark:border-gray-600">
                                    <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-500 dark:text-gray-400 font-medium">Belum ada data timbangan</p>
                            </div>
                        @endforelse
                    </div>
                </div>

                <!-- Status Absensi - Sophisticated Circle -->
                <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Status Absensi Bulan Ini</h3>
                    <div class="doughnut-container mb-6">
                        <canvas id="absensiChart"></canvas>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center justify-between text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-900 dark:bg-gray-100 rounded-full shadow-sm"></div>
                                <span class="text-gray-700 dark:text-gray-300">Hadir</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['hadir'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-600 dark:bg-gray-400 rounded-full shadow-sm"></div>
                                <span class="text-gray-700 dark:text-gray-300">Izin</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['izin'] ?? 0 }}</span>
                        </div>
                        <div class="flex items-center justify-between text-sm font-medium">
                            <div class="flex items-center space-x-3">
                                <div class="w-4 h-4 bg-gray-300 dark:bg-gray-600 rounded-full shadow-sm"></div>
                                <span class="text-gray-700 dark:text-gray-300">Tidak Hadir</span>
                            </div>
                            <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                        </div>
                    </div>
                </div>

                <!-- Top Performer - Premium -->
                <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl shadow-lg border border-gray-200/50 dark:border-gray-700/50 p-6 hover:shadow-xl hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-500">
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Top Performer Bulan Ini</h3>
                    <div class="space-y-4 custom-scroll max-h-72 overflow-y-auto">
                        @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                            <div class="flex items-center space-x-4 p-4 bg-gray-50/70 dark:bg-gray-700/70 glass-card rounded-lg border border-gray-100/60 dark:border-gray-600/60 hover:bg-gray-100/80 dark:hover:bg-gray-600/80 hover:shadow-md transition-all duration-300 animate-slide-in">
                                <div class="w-10 h-10 bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-200 dark:to-gray-400 text-white dark:text-gray-900 rounded-full flex items-center justify-center text-sm font-bold shadow-lg animate-float">
                                    {{ $index + 1 }}
                                </div>
                                <div class="flex-1">
                                    <p class="font-bold text-gray-900 dark:text-white tracking-wide">{{ $karyawan->nama }}</p>
                                    <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">{{ $karyawan->total_hadir }} hari hadir</p>
                                </div>
                                <span class="px-4 py-2 text-xs font-bold rounded-lg bg-emerald-50 dark:bg-emerald-900/30 text-emerald-700 dark:text-emerald-300 border border-emerald-200 dark:border-emerald-700 shadow-sm">
                                    {{ round(($karyawan->total_hadir / 30) * 100) }}%
                                </span>
                            </div>
                        @empty
                            <div class="text-center py-16">
                                <div class="w-20 h-20 mx-auto mb-6 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center border-2 border-gray-200 dark:border-gray-600">
                                    <svg class="w-10 h-10 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"></path>
                                    </svg>
                                </div>
                                <p class="text-gray-700 dark:text-gray-300 font-bold">Belum ada data performer</p>
                                <p class="text-sm text-gray-500 dark:text-gray-500 mt-2">Data akan muncul setelah ada aktivitas absensi</p>
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
        // Sophisticated theme detection
        const isDarkMode = () => document.documentElement.classList.contains('dark');
        
        // Monochromatic color palette
        const getThemeColors = () => {
            const dark = isDarkMode();
            return {
                background: dark ? '#1f2937' : '#ffffff',
                text: dark ? '#ffffff' : '#1f2937',
                textSecondary: dark ? '#d1d5db' : '#6b7280',
                border: dark ? '#374151' : '#e5e7eb',
                gridLines: dark ? '#374151' : '#f3f4f6',
                // Monochromatic accent colors
                primary: dark ? '#f9fafb' : '#1f2937',
                secondary: dark ? '#d1d5db' : '#6b7280',
                tertiary: dark ? '#9ca3af' : '#9ca3af'
            };
        };

        // Configure Chart.js with sophisticated defaults
        Chart.defaults.font.family = "'Inter', system-ui, -apple-system, sans-serif";
        Chart.defaults.font.weight = '500';
        Chart.defaults.color = getThemeColors().textSecondary;
        Chart.defaults.plugins.legend.display = false;

        // Sophisticated Activity Chart
        const activityCtx = document.getElementById('activityChart').getContext('2d');
        const activityChart = new Chart(activityCtx, {
            type: 'line',
            data: {
                labels: @json($tanggal7Hari),
                datasets: [{
                    label: 'Absensi',
                    data: @json($absensi7Hari),
                    borderColor: getThemeColors().primary,
                    backgroundColor: getThemeColors().primary + '15',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 7,
                    borderWidth: 3,
                    pointBackgroundColor: getThemeColors().background,
                    pointBorderColor: getThemeColors().primary,
                    pointBorderWidth: 2
                }, {
                    label: 'Timbangan',
                    data: @json($timbangan7Hari),
                    borderColor: getThemeColors().secondary,
                    backgroundColor: getThemeColors().secondary + '15',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    pointHoverRadius: 7,
                    borderWidth: 3,
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
                            drawBorder: false,
                            lineWidth: 1
                        },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 12,
                            font: { weight: '600' }
                        }
                    },
                    x: {
                        grid: { display: false },
                        ticks: {
                            color: getThemeColors().textSecondary,
                            padding: 8,
                            font: { weight: '600' }
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
                        bodyFont: { weight: '600', size: 13 }
                    }
                }
            }
        });

        // Sophisticated Salary Chart
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
                    maxBarThickness: 45
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
                            font: { weight: '600' },
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
                            font: { weight: '600' }
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
                        bodyFont: { weight: '600', size: 13 },
                        callbacks: {
                            label: function(context) {
                                return 'Total Gaji: Rp ' + new Intl.NumberFormat('id-ID').format(context.parsed.y);
                            }
                        }
                    }
                }
            }
        });

        // Perfect Circular Doughnut Chart - Monochromatic
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
                        isDarkMode() ? '#f9fafb' : '#111827', // Hadir - Dark/Light adaptive
                        isDarkMode() ? '#9ca3af' : '#4b5563', // Izin - Medium gray
                        isDarkMode() ? '#4b5563' : '#d1d5db'  // Tidak Hadir - Light gray
                    ],
                    borderWidth: 0,
                    cutout: '75%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: true,
                aspectRatio: 1, // Perfect circle
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
                        bodyFont: { weight: '600', size: 13 }
                    }
                }
            }
        });

        // Sophisticated theme change handler
        const observer = new MutationObserver(() => {
            const colors = getThemeColors();
            
            // Update all charts with new monochromatic colors
            [activityChart, gajiChart, absensiChart].forEach(chart => {
                if (chart) {
                    // Update sophisticated grid and text colors
                    if (chart.options.scales?.y?.grid) {
                        chart.options.scales.y.grid.color = colors.gridLines;
                    }
                    if (chart.options.scales?.y?.ticks) {
                        chart.options.scales.y.ticks.color = colors.textSecondary;
                    }
                    if (chart.options.scales?.x?.ticks) {
                        chart.options.scales.x.ticks.color = colors.textSecondary;
                    }
                    
                    // Update tooltips with refined styling
                    if (chart.options.plugins?.tooltip) {
                        chart.options.plugins.tooltip.backgroundColor = colors.background + 'f0';
                        chart.options.plugins.tooltip.titleColor = colors.text;
                        chart.options.plugins.tooltip.bodyColor = colors.text;
                        chart.options.plugins.tooltip.borderColor = colors.border;
                    }
                    
                    // Update dataset colors for line chart
                    if (chart.config.type === 'line') {
                        chart.data.datasets[0].borderColor = colors.primary;
                        chart.data.datasets[0].backgroundColor = colors.primary + '15';
                        chart.data.datasets[0].pointBorderColor = colors.primary;
                        chart.data.datasets[1].borderColor = colors.secondary;
                        chart.data.datasets[1].backgroundColor = colors.secondary + '15';
                        chart.data.datasets[1].pointBorderColor = colors.secondary;
                    }
                    
                    // Update bar chart colors
                    if (chart.config.type === 'bar') {
                        chart.data.datasets[0].backgroundColor = colors.primary;
                    }
                    
                    // Update doughnut chart colors - Monochromatic
                    if (chart.config.type === 'doughnut') {
                        chart.data.datasets[0].backgroundColor = [
                            isDarkMode() ? '#f9fafb' : '#111827', // Hadir
                            isDarkMode() ? '#9ca3af' : '#4b5563', // Izin  
                            isDarkMode() ? '#4b5563' : '#d1d5db'  // Tidak Hadir
                        ];
                    }
                    
                    chart.update();
                }
            });
        });

        observer.observe(document.documentElement, {
            attributes: true,
            attributeFilter: ['class']
        });

        console.log('🎨 Sophisticated Monochromatic Dashboard Loaded!');
    </script>
    @endpush
</x-app-layout>