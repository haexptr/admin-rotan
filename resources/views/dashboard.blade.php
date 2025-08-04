<x-app-layout>
    @section('title', 'Dashboard')

    <!-- Clean & Proper Dashboard CSS -->
    <style>
        /* Reset */
        * {
            box-sizing: border-box;
        }

        ::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }

        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        /* Dashboard Container - FULL ISI */
        .dashboard-container {
            /* PERBAIKAN: Hilangkan padding untuk full width */
            padding: 0;
            margin: 0;
            background: #f8fafc;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            /* PERBAIKAN: Padding hanya di dalam untuk spacing */
            padding: 1.5rem;
            width: 100%;
            box-sizing: border-box;
        }

        /* Welcome Card */
        .welcome-card {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 25%, #8b5cf6 75%, #a855f7 100%);
            border-radius: 1rem;
            padding: 2rem;
            color: white;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
            animation: slideUp 0.6s ease-out;
        }

        .welcome-card:hover {
            transform: translateY(-2px);
            transition: all 0.4s ease;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.15);
        }

        /* Grid Layout - Proper 3 Columns */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 1.5rem;
        }

        /* Card Styling */
        .card {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
            animation: slideUp 0.8s ease-out;
        }

        .card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.12);
        }

        /* Grid Positioning */
        .activity-card { grid-column: 1; grid-row: 1 / 3; }
        .trend-card { grid-column: 2; grid-row: 1; }
        .salary-card { grid-column: 3; grid-row: 1; }
        .attendance-card { grid-column: 2; grid-row: 2; }
        .performer-card { grid-column: 3; grid-row: 2; }

        /* Activity Section */
        .activity-section {
            margin-bottom: 1.5rem;
        }

        .activity-section-title {
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            color: #6b7280;
        }

        .activity-section-title::before {
            content: '';
            width: 6px;
            height: 6px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        .activity-section-title.absensi::before { background: #10b981; }
        .activity-section-title.timbangan::before { background: #f59e0b; }

        .activity-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 1rem;
            background: #f8fafc;
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            border: 1px solid #e2e8f0;
        }

        .activity-item:hover {
            background: #f1f5f9;
            transform: translateY(-1px);
        }

        .status-hadir {
            background: #d1fae5;
            color: #065f46;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        .status-weight {
            background: #fef3c7;
            color: #92400e;
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
        }

        /* Chart Containers */
        .chart-container {
            height: 280px;
            background: #f8fafc;
            border-radius: 0.5rem;
            padding: 1rem;
            border: 1px solid #e2e8f0;
            margin-top: 1rem;
        }

        .doughnut-container {
            height: 200px;
            width: 200px;
            margin: 0 auto 1rem auto;
            background: #f8fafc;
            border-radius: 50%;
            padding: 1rem;
            border: 1px solid #e2e8f0;
        }

        /* Legend */
        .legend-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(0, 0, 0, 0.05);
            font-size: 0.875rem;
            font-weight: 600;
        }

        .legend-item:last-child { border-bottom: none; }

        .legend-color {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            margin-right: 0.5rem;
        }

        /* Performers */
        .performer-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background: #f8fafc;
            border-radius: 0.75rem;
            margin-bottom: 0.5rem;
            border: 1px solid #e2e8f0;
            transition: all 0.3s ease;
        }

        .performer-item:hover {
            background: #f1f5f9;
            transform: translateY(-1px);
        }

        .performer-rank {
            width: 32px;
            height: 32px;
            background: linear-gradient(135deg, #3b82f6, #1d4ed8);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 0.75rem;
            font-weight: 700;
            margin-right: 0.75rem;
        }

        .performer-percentage {
            background: #d1fae5;
            color: #065f46;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
        }

        /* Quick Actions */
        .quick-actions {
            background: white;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.08);
            border: 1px solid #e2e8f0;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.5rem 1rem;
            border: 2px dashed #e5e7eb;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
            background: #f8fafc;
            color: #374151;
        }

        .action-item:hover {
            transform: translateY(-2px);
            border-color: #3b82f6;
            background: white;
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.1);
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        }

        /* Animation */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        /* Responsive - Container based */
        @media (max-width: 1200px) {
            .dashboard-container {
                padding: 1rem;
            }
            .dashboard-grid {
                gap: 1rem;
            }
        }

        @media (max-width: 1024px) {
            .dashboard-grid {
                grid-template-columns: 1fr 1fr;
            }
            .activity-card { grid-column: 1 / 3; grid-row: 1; }
            .trend-card { grid-column: 1; grid-row: 2; }
            .salary-card { grid-column: 2; grid-row: 2; }
            .attendance-card { grid-column: 1; grid-row: 3; }
            .performer-card { grid-column: 2; grid-row: 3; }
            .actions-grid { grid-template-columns: repeat(2, 1fr); }
        }

        @media (max-width: 768px) {
            .dashboard-container { 
                padding: 0.75rem; 
            }
            .dashboard-grid { 
                grid-template-columns: 1fr;
                gap: 1rem;
            }
            .activity-card,
            .trend-card,
            .salary-card,
            .attendance-card,
            .performer-card { 
                grid-column: 1; 
                grid-row: auto; 
            }
            .actions-grid { 
                grid-template-columns: 1fr; 
            }
        }

        /* Dark Mode - Container based */
        .dark .dashboard-container {
            background: #111827 !important;
        }

        .dark .card,
        .dark .quick-actions {
            background: #1f2937;
            color: white;
            border-color: #374151;
        }

        .dark .activity-item,
        .dark .performer-item {
            background: #374151;
            border-color: #4b5563;
        }

        .dark .chart-container,
        .dark .doughnut-container {
            background: #374151;
            border-color: #4b5563;
        }

        .dark .action-item {
            background: #374151;
            border-color: #4b5563;
            color: #f3f4f6;
        }

        .dark .action-item:hover {
            background: #1f2937;
            border-color: #3b82f6;
        }
    </style>

    <!-- Dashboard Content -->
    <div class="dashboard-container">
        
        <!-- Welcome Card -->
        <div class="welcome-card">
            <div class="flex items-center space-x-6">
                <div class="w-16 h-16 bg-white bg-opacity-20 rounded-full flex items-center justify-center">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path>
                    </svg>
                </div>
                <div>
                    <h1 class="text-3xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-white text-opacity-90 font-semibold text-lg">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            
            <!-- Activity Card -->
            <div class="card activity-card">
                <h3 class="text-xl font-bold text-gray-900 dark:text-white mb-6">Aktivitas Terbaru</h3>
                
                <div class="activity-section">
                    <div class="activity-section-title absensi">Absensi Terbaru</div>
                    @forelse($recentAbsensi->take(2) as $absensi)
                        <div class="activity-item">
                            <span class="font-medium text-gray-800 dark:text-gray-200">{{ $absensi->karyawan->nama }}</span>
                            <span class="status-hadir">Hadir</span>
                        </div>
                    @empty
                        <div class="activity-item">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Belum ada data absensi</span>
                            <span class="status-hadir">-</span>
                        </div>
                    @endforelse
                </div>

                <div class="activity-section">
                    <div class="activity-section-title timbangan">Timbangan Terbaru</div>
                    @forelse($recentTimbangan->take(3) as $timbangan)
                        <div class="activity-item">
                            <span class="font-medium text-gray-800 dark:text-gray-200">{{ $timbangan->karyawan->nama }}</span>
                            <span class="status-weight">{{ $timbangan->deskripsi_timbangan }}</span>
                        </div>
                    @empty
                        <div class="activity-item">
                            <span class="font-medium text-gray-800 dark:text-gray-200">Belum ada data timbangan</span>
                            <span class="status-weight">-</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Trend Card -->
            <div class="card trend-card">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tren Aktivitas 7 Hari</h3>
                    <div class="flex items-center space-x-3 text-sm">
                        <div class="flex items-center space-x-1">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span class="text-gray-600 dark:text-gray-300">Absensi</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                            <span class="text-gray-600 dark:text-gray-300">Timbangan</span>
                        </div>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

            <!-- Salary Card -->
            <div class="card salary-card">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Tren Gaji 6 Bulan Terakhir</h3>
                    <div class="text-sm font-semibold text-gray-600 dark:text-gray-300">
                        Total: <span class="font-bold text-gray-900 dark:text-white">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</span>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="salaryChart"></canvas>
                </div>
            </div>

            <!-- Attendance Card -->
            <div class="card attendance-card">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Status Absensi Bulan Ini</h3>
                <div class="doughnut-container mb-4">
                    <canvas id="attendanceChart"></canvas>
                </div>
                <div class="space-y-2">
                    <div class="legend-item">
                        <div class="flex items-center">
                            <div class="legend-color bg-green-500"></div>
                            <span class="text-gray-700 dark:text-gray-300">Hadir</span>
                        </div>
                        <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['hadir'] ?? 0 }}</span>
                    </div>
                    <div class="legend-item">
                        <div class="flex items-center">
                            <div class="legend-color bg-yellow-500"></div>
                            <span class="text-gray-700 dark:text-gray-300">Izin</span>
                        </div>
                        <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['izin'] ?? 0 }}</span>
                    </div>
                    <div class="legend-item">
                        <div class="flex items-center">
                            <div class="legend-color bg-red-500"></div>
                            <span class="text-gray-700 dark:text-gray-300">Tidak Hadir</span>
                        </div>
                        <span class="font-bold text-gray-900 dark:text-white">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <!-- Performer Card -->
            <div class="card performer-card">
                <h3 class="text-lg font-bold text-gray-900 dark:text-white mb-4">Top Performer Bulan Ini</h3>
                <div class="max-h-80 overflow-y-auto">
                    @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                        <div class="performer-item">
                            <div class="performer-rank">{{ $index + 1 }}</div>
                            <div class="flex-1">
                                <div class="font-semibold text-gray-900 dark:text-white">{{ $karyawan->nama }}</div>
                                <div class="text-sm text-gray-600 dark:text-gray-400">{{ $karyawan->total_hadir }} hari hadir</div>
                            </div>
                            <div class="performer-percentage">{{ round(($karyawan->total_hadir / 30) * 100) }}%</div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p class="text-gray-500 dark:text-gray-400">Belum ada data performer</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3 class="text-lg font-bold text-gray-800 dark:text-white">Aksi Cepat</h3>
            <div class="actions-grid">
                <a href="{{ route('karyawans.create') }}" class="action-item">
                    <div class="action-icon bg-gradient-to-br from-blue-500 to-blue-600">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">Tambah Karyawan</span>
                </a>

                <a href="{{ route('absensis.create') }}" class="action-item">
                    <div class="action-icon bg-gradient-to-br from-green-500 to-green-600">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">Catat Absensi</span>
                </a>

                <a href="{{ route('timbangans.create') }}" class="action-item">
                    <div class="action-icon bg-gradient-to-br from-yellow-500 to-yellow-600">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">Input Timbangan</span>
                </a>

                <a href="{{ route('gajis.create') }}" class="action-item">
                    <div class="action-icon bg-gradient-to-br from-purple-500 to-purple-600">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 9V7a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2m2 4h10a2 2 0 002-2v-6a2 2 0 00-2-2H9a2 2 0 00-2 2v6a2 2 0 002 2zm7-5a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                    </div>
                    <span class="text-sm font-semibold">Hitung Gaji</span>
                </a>
            </div>
        </div>
    </div>

    @push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.js"></script>
    <script>
        // Data preparation
        const chartData = {
            tanggal7Hari: {!! json_encode($tanggal7Hari ?? ['29/07', '30/07', '31/07', '01/08', '02/08', '03/08', '04/08']) !!},
            absensi7Hari: {!! json_encode($absensi7Hari ?? [0, 0, 0, 1, 0, 1, 0]) !!},
            timbangan7Hari: {!! json_encode($timbangan7Hari ?? [0, 0, 0, 0, 0, 1, 0]) !!},
            bulanLabels: {!! json_encode($bulanLabels ?? ['Mar 2025', 'Apr 2025', 'May 2025', 'Jun 2025', 'Jul 2025', 'Aug 2025']) !!},
            gajiBulanan: {!! json_encode($gajiBulanan ?? [0, 0, 0, 0, 0, 400000]) !!},
            absensiStats: {
                hadir: {{ $absensiStats['hadir'] ?? 1 }},
                izin: {{ $absensiStats['izin'] ?? 0 }},
                tidak_hadir: {{ $absensiStats['tidak_hadir'] ?? 0 }}
            }
        };

        // Theme colors
        const isDarkMode = () => document.documentElement.classList.contains('dark');
        const getThemeColors = () => {
            const dark = isDarkMode();
            return {
                text: dark ? '#f9fafb' : '#111827',
                textSecondary: dark ? '#d1d5db' : '#6b7280',
                gridLines: dark ? '#4b5563' : '#f3f4f6'
            };
        };

        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.plugins.legend.display = false;

        // Activity Chart
        const activityCtx = document.getElementById('activityChart').getContext('2d');
        new Chart(activityCtx, {
            type: 'line',
            data: {
                labels: chartData.tanggal7Hari,
                datasets: [{
                    data: chartData.absensi7Hari,
                    borderColor: '#3b82f6',
                    backgroundColor: 'rgba(59, 130, 246, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    borderWidth: 2
                }, {
                    data: chartData.timbangan7Hari,
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { beginAtZero: true, grid: { color: getThemeColors().gridLines } },
                    x: { grid: { display: false } }
                }
            }
        });

        // Salary Chart
        const salaryCtx = document.getElementById('salaryChart').getContext('2d');
        new Chart(salaryCtx, {
            type: 'bar',
            data: {
                labels: chartData.bulanLabels,
                datasets: [{
                    data: chartData.gajiBulanan,
                    backgroundColor: '#8b5cf6',
                    borderRadius: 8,
                    maxBarThickness: 40
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: getThemeColors().gridLines },
                        ticks: { 
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    },
                    x: { grid: { display: false } }
                }
            }
        });

        // Attendance Chart
        const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
        new Chart(attendanceCtx, {
            type: 'doughnut',
            data: {
                datasets: [{
                    data: [chartData.absensiStats.hadir, chartData.absensiStats.izin, chartData.absensiStats.tidak_hadir],
                    backgroundColor: ['#10b981', '#f59e0b', '#ef4444'],
                    borderWidth: 0,
                    cutout: '70%'
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false
            }
        });

        console.log('✅ Clean Dashboard Loaded Successfully!');
    </script>
    @endpush
</x-app-layout>