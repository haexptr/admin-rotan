<x-app-layout>
    @section('title', 'Dashboard')

    <div class="space-y-6">
        <!-- Welcome Card -->
        <div class="bg-gradient-to-r from-blue-600 to-purple-600 rounded-xl shadow-lg p-6 text-white">
            <h2 class="text-2xl font-bold mb-2">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-blue-100">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
        </div>

        <!-- Stats Cards - Improved Layout -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-4">
            <!-- Total Karyawan -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-blue-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Total Karyawan</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalKaryawan ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-blue-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Absensi Hari Ini -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-green-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Hadir Hari Ini</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalAbsensiHariIni ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Timbangan Hari Ini -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-yellow-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Timbangan Hari Ini</p>
                        <p class="text-3xl font-bold text-gray-900">{{ $totalTimbanganHariIni ?? 0 }}</p>
                    </div>
                    <div class="w-12 h-12 bg-yellow-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                        </svg>
                    </div>
                </div>
            </div>

            <!-- Total Gaji Bulan Ini -->
            <div class="bg-white rounded-lg shadow-sm p-6 border-l-4 border-purple-500">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-500 uppercase">Gaji Bulan Ini</p>
                        <p class="text-2xl font-bold text-gray-900">Rp {{ number_format($totalGajiBulanIni ?? 0, 0, ',', '.') }}</p>
                    </div>
                    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                        </svg>
                    </div>
                </div>
            </div>
        </div>

        <!-- Charts Section - Improved Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Activity Trend Chart -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-semibold text-gray-900">Tren Aktivitas 7 Hari</h3>
                    <div class="flex space-x-4 text-sm">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-blue-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Absensi</span>
                        </div>
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <span class="text-gray-600">Timbangan</span>
                        </div>
                    </div>
                </div>
                <div class="h-64">
                    <canvas id="activityChart"></canvas>
                </div>
            </div>

            <!-- Status Distribution -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Status Absensi Bulan Ini</h3>
                <div class="flex items-center justify-center h-48">
                    <canvas id="absensiChart"></canvas>
                </div>
                <div class="mt-4 space-y-2">
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-green-500 rounded-full mr-2"></div>
                            <span>Hadir</span>
                        </div>
                        <span class="font-medium">{{ $absensiStats['hadir'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-yellow-500 rounded-full mr-2"></div>
                            <span>Izin</span>
                        </div>
                        <span class="font-medium">{{ $absensiStats['izin'] }}</span>
                    </div>
                    <div class="flex items-center justify-between text-sm">
                        <div class="flex items-center">
                            <div class="w-3 h-3 bg-red-500 rounded-full mr-2"></div>
                            <span>Tidak Hadir</span>
                        </div>
                        <span class="font-medium">{{ $absensiStats['tidak_hadir'] }}</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Salary Trend Chart -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <div class="flex items-center justify-between mb-4">
                <h3 class="text-lg font-semibold text-gray-900">Tren Gaji 6 Bulan Terakhir</h3>
                <div class="text-sm text-gray-500">
                    Total: Rp {{ number_format(array_sum($gajiBulanan), 0, ',', '.') }}
                </div>
            </div>
            <div class="h-64">
                <canvas id="gajiChart"></canvas>
            </div>
        </div>

        <!-- Bottom Section - Improved Layout -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Top Performers -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Top Performer Bulan Ini</h3>
                <div class="space-y-4">
                    @forelse($topKaryawanAbsensi->take(5) as $index => $karyawan)
                        <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 bg-gradient-to-r from-blue-500 to-purple-500 rounded-full flex items-center justify-center text-white font-bold">
                                    {{ $index + 1 }}
                                </div>
                                <div>
                                    <p class="font-medium text-gray-900">{{ $karyawan->nama }}</p>
                                    <p class="text-sm text-gray-500">{{ $karyawan->total_hadir }} hari hadir</p>
                                </div>
                            </div>
                            <span class="text-sm font-medium text-green-600 bg-green-100 px-2 py-1 rounded">
                                {{ round(($karyawan->total_hadir / 30) * 100) }}%
                            </span>
                        </div>
                    @empty
                        <p class="text-gray-500 text-center py-8">Belum ada data</p>
                    @endforelse
                </div>
            </div>

            <!-- Quick Actions -->
            <div class="bg-white rounded-lg shadow-sm p-6">
                <h3 class="text-lg font-semibold text-gray-900 mb-4">Aksi Cepat</h3>
                <div class="grid grid-cols-2 gap-4">
                    <a href="{{ route('karyawans.create') }}" 
                       class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-blue-500 hover:bg-blue-50 transition-all duration-200 group">
                        <div class="w-12 h-12 bg-blue-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-blue-700 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Tambah Karyawan</span>
                    </a>

                    <a href="{{ route('absensis.create') }}" 
                       class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-green-500 hover:bg-green-50 transition-all duration-200 group">
                        <div class="w-12 h-12 bg-green-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-green-700 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Catat Absensi</span>
                    </a>

                    <a href="{{ route('timbangans.create') }}" 
                       class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-yellow-500 hover:bg-yellow-50 transition-all duration-200 group">
                        <div class="w-12 h-12 bg-yellow-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-yellow-700 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Input Timbangan</span>
                    </a>

                    <a href="{{ route('gajis.create') }}" 
                       class="flex flex-col items-center justify-center p-4 border-2 border-dashed border-gray-300 rounded-lg hover:border-purple-500 hover:bg-purple-50 transition-all duration-200 group">
                        <div class="w-12 h-12 bg-purple-600 rounded-full flex items-center justify-center mb-3 group-hover:bg-purple-700 transition-colors">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                            </svg>
                        </div>
                        <span class="text-sm font-medium text-gray-700 text-center">Hitung Gaji</span>
                    </a>
                </div>
            </div>
        </div>

        <!-- Recent Activities -->
        <div class="bg-white rounded-lg shadow-sm p-6">
            <h3 class="text-lg font-semibold text-gray-900 mb-4">Aktivitas Terbaru</h3>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Recent Absensi -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Absensi Terbaru</h4>
                    <div class="space-y-3">
                        @forelse($recentAbsensi->take(3) as $absensi)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm font-medium text-gray-900">{{ $absensi->karyawan->nama }}</span>
                                <span class="px-2 py-1 text-xs rounded-full 
                                    {{ $absensi->hadir ? 'bg-green-100 text-green-800' : ($absensi->izin ? 'bg-yellow-100 text-yellow-800' : 'bg-red-100 text-red-800') }}">
                                    {{ $absensi->hadir ? 'Hadir' : ($absensi->izin ? 'Izin' : 'Tidak Hadir') }}
                                </span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm text-center py-4">Belum ada data</p>
                        @endforelse
                    </div>
                </div>

                <!-- Recent Timbangan -->
                <div>
                    <h4 class="text-sm font-medium text-gray-700 mb-3">Timbangan Terbaru</h4>
                    <div class="space-y-3">
                        @forelse($recentTimbangan->take(3) as $timbangan)
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-lg">
                                <span class="text-sm font-medium text-gray-900">{{ $timbangan->karyawan->nama }}</span>
                                <span class="text-xs text-gray-500">{{ $timbangan->deskripsi_timbangan }}</span>
                            </div>
                        @empty
                            <p class="text-gray-500 text-sm text-center py-4">Belum ada data</p>
                        @endforelse
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
    </script>
    @endpush
</x-app-layout>