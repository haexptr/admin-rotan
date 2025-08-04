<x-app-layout>
    @section('title', 'Dashboard')

    <!-- Custom Dark Theme CSS dengan Palette Warna -->
    <style>
        /* Custom Color Palette Variables */
        :root {
            --color-black: #242424;
            --color-gray: #6D6D6D;
            --color-light: #E7E7E7;
            --color-white: #FAFAFA;
        }

        /* Reset */
        * {
            box-sizing: border-box;
        }

        ::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }

        ::-webkit-scrollbar-thumb {
            background: transparent;
        }

        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }

        /* Dashboard Container - Dark Theme */
        .dashboard-container {
            padding: 1.5rem;
            margin: 0;
            background: var(--color-black);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            width: 100%;
            box-sizing: border-box;
        }

        /* Welcome Card - Enhanced Dark */
        .welcome-card {
            background: linear-gradient(135deg, #4f46e5 0%, #3b82f6 25%, #8b5cf6 75%, #a855f7 100%);
            border-radius: 1rem;
            padding: 2rem;
            color: var(--color-white);
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.4);
            animation: slideUp 0.6s ease-out;
            border: 1px solid rgba(255, 255, 255, 0.1);
        }

        .welcome-card:hover {
            transform: translateY(-3px);
            transition: all 0.4s ease;
            box-shadow: 0 12px 40px rgba(0, 0, 0, 0.5);
        }

        /* Grid Layout - Tetap 3 Kolom */
        .dashboard-grid {
            display: grid;
            grid-template-columns: 1fr 1fr 1fr;
            grid-template-rows: auto auto;
            gap: 1.5rem;
        }

        /* Card Styling - Forced Dark Theme untuk Light dan Dark Mode */
        .card {
            background: var(--color-black) !important;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            border: 1px solid var(--color-gray) !important;
            transition: all 0.3s ease;
            animation: slideUp 0.8s ease-out;
        }

        .card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5) !important;
            border-color: var(--color-light) !important;
        }

        /* Grid Positioning - Tetap sama */
        .activity-card { grid-column: 1; grid-row: 1 / 3; }
        .trend-card { grid-column: 2; grid-row: 1; }
        .salary-card { grid-column: 3; grid-row: 1; }
        .attendance-card { grid-column: 2; grid-row: 2; }
        .performer-card { grid-column: 3; grid-row: 2; }

        /* Activity Section - Dark Theme */
        .activity-section {
            margin-bottom: 1.5rem;
        }

        .activity-section-title {
            font-size: 0.875rem;
            font-weight: 600;
            margin-bottom: 1rem;
            display: flex;
            align-items: center;
            color: var(--color-light);
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
            background: rgba(109, 109, 109, 0.1);
            border-radius: 0.5rem;
            margin-bottom: 0.75rem;
            transition: all 0.3s ease;
            border: 1px solid rgba(109, 109, 109, 0.2);
        }

        .activity-item:hover {
            background: rgba(109, 109, 109, 0.2);
            transform: translateY(-1px);
            border-color: var(--color-light);
        }

        .status-hadir {
            background: rgba(109, 109, 109, 0.3);
            color: var(--color-light);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(109, 109, 109, 0.4);
        }

        .status-weight {
            background: rgba(109, 109, 109, 0.3);
            color: var(--color-light);
            padding: 0.25rem 0.75rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 500;
            border: 1px solid rgba(109, 109, 109, 0.4);
        }

        /* Chart Containers - Dark Theme */
        .chart-container {
            height: 280px;
            background: rgba(109, 109, 109, 0.05);
            border-radius: 0.5rem;
            padding: 1rem;
            border: 1px solid rgba(109, 109, 109, 0.2);
            margin-top: 1rem;
        }

        .doughnut-container {
            height: 200px;
            width: 200px;
            margin: 0 auto 1rem auto;
            background: rgba(109, 109, 109, 0.05);
            border-radius: 50%;
            padding: 1rem;
            border: 1px solid rgba(109, 109, 109, 0.2);
        }

        /* Legend - Dark Theme */
        .legend-item {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0.5rem 0;
            border-bottom: 1px solid rgba(109, 109, 109, 0.2);
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

        /* Performers - Dark Theme */
        .performer-item {
            display: flex;
            align-items: center;
            padding: 0.75rem;
            background: rgba(109, 109, 109, 0.1);
            border-radius: 0.75rem;
            margin-bottom: 0.5rem;
            border: 1px solid rgba(109, 109, 109, 0.2);
            transition: all 0.3s ease;
        }

        .performer-item:hover {
            background: rgba(109, 109, 109, 0.2);
            transform: translateY(-1px);
            border-color: var(--color-light);
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
            box-shadow: 0 4px 15px rgba(59, 130, 246, 0.3);
        }

        .performer-percentage {
            background: rgba(16, 185, 129, 0.2);
            color: #10b981;
            padding: 0.25rem 0.5rem;
            border-radius: 1rem;
            font-size: 0.75rem;
            font-weight: 600;
            border: 1px solid rgba(16, 185, 129, 0.3);
        }

        /* Quick Actions - Forced Dark Theme untuk Light dan Dark Mode */
        .quick-actions {
            background: var(--color-black) !important;
            border-radius: 1rem;
            padding: 1.5rem;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            border: 1px solid var(--color-gray) !important;
        }

        .actions-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 1rem;
            margin-top: 1rem;
        }

        /* Action Items - Forced Dark Theme untuk Light dan Dark Mode */
        .action-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.5rem 1rem;
            border: 2px dashed var(--color-gray) !important;
            border-radius: 0.75rem;
            text-decoration: none;
            transition: all 0.3s ease;
            background: var(--color-black) !important;
            color: var(--color-white) !important;
        }

        .action-item:hover {
            transform: translateY(-3px);
            border-color: var(--color-light) !important;
            background: var(--color-black) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3) !important;
        }

        .action-icon {
            width: 48px;
            height: 48px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 0.75rem;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3);
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

        /* Dark Mode Text Colors */
        .text-gray-900 { color: var(--color-white) !important; }
        .text-white { color: var(--color-white) !important; }
        .text-gray-600 { color: var(--color-light) !important; }
        .text-gray-700 { color: var(--color-light) !important; }
        .text-gray-800 { color: var(--color-white) !important; }
        .text-gray-300 { color: var(--color-light) !important; }
        .text-gray-200 { color: var(--color-white) !important; }
        .text-gray-400 { color: var(--color-gray) !important; }
        .text-gray-500 { color: var(--color-gray) !important; }

        /* Override Tailwind dark mode classes jika diperlukan */
        .dark\:text-white { color: var(--color-white) !important; }
        .dark\:text-gray-200 { color: var(--color-white) !important; }
        .dark\:text-gray-300 { color: var(--color-light) !important; }
        .dark\:text-gray-400 { color: var(--color-gray) !important; }

        /* Global Dark Theme Override - Paksa semua elemen menggunakan dark theme */
        body {
            background: var(--color-black) !important;
        }

        /* Dashboard Container - Forced Dark Theme */
        .dashboard-container {
            padding: 1.5rem;
            margin: 0;
            background: var(--color-black) !important;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            gap: 1.5rem;
            width: 100%;
            box-sizing: border-box;
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
                    <h1 class="text-3xl font-bold mb-2" style="color: var(--color-white);">Selamat Datang, {{ Auth::user()->name }}!</h1>
                    <p class="text-white text-opacity-90 font-semibold text-lg">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
                </div>
            </div>
        </div>

        <!-- Dashboard Grid -->
        <div class="dashboard-grid">
            
            <!-- Activity Card -->
            <div class="card activity-card">
                <h3 class="text-xl font-bold mb-6" style="color: var(--color-white);">Aktivitas Terbaru</h3>
                
                <div class="activity-section">
                    <div class="activity-section-title absensi">Absensi Terbaru</div>
                    @forelse($recentAbsensi->take(2) as $absensi)
                        <div class="activity-item">
                            <span class="font-medium" style="color: var(--color-white);">{{ $absensi->karyawan->nama }}</span>
                            <span class="status-hadir">Hadir</span>
                        </div>
                    @empty
                        <div class="activity-item">
                            <span class="font-medium" style="color: var(--color-white);">Belum ada data absensi</span>
                            <span class="status-hadir">-</span>
                        </div>
                    @endforelse
                </div>

                <div class="activity-section">
                    <div class="activity-section-title timbangan">Timbangan Terbaru</div>
                    @forelse($recentTimbangan->take(3) as $timbangan)
                        <div class="activity-item">
                            <span class="font-medium" style="color: var(--color-white);">{{ $timbangan->karyawan->nama }}</span>
                            <span class="status-weight">{{ $timbangan->deskripsi_timbangan }}</span>
                        </div>
                    @empty
                        <div class="activity-item">
                            <span class="font-medium" style="color: var(--color-white);">Belum ada data timbangan</span>
                            <span class="status-weight">-</span>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Trend Card -->
            <div class="card trend-card">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold" style="color: var(--color-white);">Tren Aktivitas 7 Hari</h3>
                    <div class="flex items-center space-x-3 text-sm">
                        <div class="flex items-center space-x-1">
                            <div class="w-3 h-3 bg-blue-500 rounded-full"></div>
                            <span style="color: var(--color-light);">Absensi</span>
                        </div>
                        <div class="flex items-center space-x-1">
                            <div class="w-3 h-3 bg-orange-500 rounded-full"></div>
                            <span style="color: var(--color-light);">Timbangan</span>
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
                    <h3 class="text-lg font-bold" style="color: var(--color-white);">Tren Gaji 6 Bulan Terakhir</h3>
                    <div class="text-sm font-semibold" style="color: var(--color-light);">
                        Total: <span class="font-bold" style="color: var(--color-white);">Rp {{ number_format(array_sum($gajiBulanan ?? [0]), 0, ',', '.') }}</span>
                    </div>
                </div>
                <div class="chart-container">
                    <canvas id="salaryChart"></canvas>
                </div>
            </div>

            <!-- Attendance Card -->
            <div class="card attendance-card">
                <h3 class="text-lg font-bold mb-4" style="color: var(--color-white);">Status Absensi Bulan Ini</h3>
                <div class="doughnut-container mb-4">
                    <canvas id="attendanceChart"></canvas>
                </div>
                <div class="space-y-2">
                    <div class="legend-item">
                        <div class="flex items-center">
                            <div class="legend-color bg-green-500"></div>
                            <span style="color: var(--color-light);">Hadir</span>
                        </div>
                        <span class="font-bold" style="color: var(--color-white);">{{ $absensiStats['hadir'] ?? 0 }}</span>
                    </div>
                    <div class="legend-item">
                        <div class="flex items-center">
                            <div class="legend-color bg-yellow-500"></div>
                            <span style="color: var(--color-light);">Izin</span>
                        </div>
                        <span class="font-bold" style="color: var(--color-white);">{{ $absensiStats['izin'] ?? 0 }}</span>
                    </div>
                    <div class="legend-item">
                        <div class="flex items-center">
                            <div class="legend-color bg-red-500"></div>
                            <span style="color: var(--color-light);">Tidak Hadir</span>
                        </div>
                        <span class="font-bold" style="color: var(--color-white);">{{ $absensiStats['tidak_hadir'] ?? 0 }}</span>
                    </div>
                </div>
            </div>

            <!-- Performer Card -->
            <div class="card performer-card">
                <h3 class="text-lg font-bold mb-4" style="color: var(--color-white);">Top Performer Bulan Ini</h3>
                <div class="max-h-80 overflow-y-auto">
                    @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                        <div class="performer-item">
                            <div class="performer-rank">{{ $index + 1 }}</div>
                            <div class="flex-1">
                                <div class="font-semibold" style="color: var(--color-white);">{{ $karyawan->nama }}</div>
                                <div class="text-sm" style="color: var(--color-light);">{{ $karyawan->total_hadir }} hari hadir</div>
                            </div>
                            <div class="performer-percentage">{{ round(($karyawan->total_hadir / 30) * 100) }}%</div>
                        </div>
                    @empty
                        <div class="text-center py-8">
                            <p style="color: var(--color-gray);">Belum ada data performer</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>

        <!-- Quick Actions -->
        <div class="quick-actions">
            <h3 class="text-lg font-bold" style="color: var(--color-white);">Aksi Cepat</h3>
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
        // Data preparation - tetap menggunakan data Laravel
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

        // Theme colors untuk dark mode
        const getThemeColors = () => {
            return {
                text: '#FAFAFA',
                textSecondary: '#E7E7E7',
                gridLines: '#6D6D6D'
            };
        };

        Chart.defaults.font.family = "'Inter', sans-serif";
        Chart.defaults.plugins.legend.display = false;
        Chart.defaults.color = '#FAFAFA';

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
                    borderWidth: 3,
                    pointBackgroundColor: '#3b82f6',
                    pointBorderColor: '#FAFAFA',
                    pointBorderWidth: 2
                }, {
                    data: chartData.timbangan7Hari,
                    borderColor: '#f59e0b',
                    backgroundColor: 'rgba(245, 158, 11, 0.1)',
                    tension: 0.4,
                    fill: true,
                    pointRadius: 4,
                    borderWidth: 3,
                    pointBackgroundColor: '#f59e0b',
                    pointBorderColor: '#FAFAFA',
                    pointBorderWidth: 2
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: { 
                        beginAtZero: true, 
                        grid: { color: '#6D6D6D' },
                        ticks: { color: '#E7E7E7' }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { color: '#E7E7E7' }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(36, 36, 36, 0.9)',
                        titleColor: '#FAFAFA',
                        bodyColor: '#FAFAFA',
                        borderColor: '#6D6D6D',
                        borderWidth: 1
                    }
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
                        grid: { color: '#6D6D6D' },
                        ticks: { 
                            color: '#E7E7E7',
                            callback: function(value) {
                                return 'Rp ' + value.toLocaleString('id-ID');
                            }
                        }
                    },
                    x: { 
                        grid: { display: false },
                        ticks: { color: '#E7E7E7' }
                    }
                },
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(36, 36, 36, 0.9)',
                        titleColor: '#FAFAFA',
                        bodyColor: '#FAFAFA',
                        borderColor: '#6D6D6D',
                        borderWidth: 1,
                        callbacks: {
                            label: function(context) {
                                return 'Rp ' + context.raw.toLocaleString('id-ID');
                            }
                        }
                    }
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
                maintainAspectRatio: false,
                plugins: {
                    tooltip: {
                        backgroundColor: 'rgba(36, 36, 36, 0.9)',
                        titleColor: '#FAFAFA',
                        bodyColor: '#FAFAFA',
                        borderColor: '#6D6D6D',
                        borderWidth: 1
                    }
                }
            }
        });

        console.log('🌙 Dark Theme Laravel Dashboard Loaded Successfully!');
    </script>
    @endpush
</x-app-layout>