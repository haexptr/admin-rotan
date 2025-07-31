<x-app-layout>
    @section('title', 'Detail Gaji')

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">
                            Detail Gaji Karyawan
                        </h1>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Informasi lengkap gaji untuk {{ $gaji->karyawan->nama ?? 'Karyawan' }}
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('gajis.edit', $gaji) }}" 
                           class="inline-flex items-center justify-center px-4 py-2.5 bg-green-600 hover:bg-green-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                            </svg>
                            Edit Gaji
                        </a>
                        <a href="{{ route('gajis.index') }}" 
                           class="inline-flex items-center justify-center px-4 py-2.5 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                            Kembali
                        </a>
                    </div>
                </div>
            </div>

            <!-- Main Content Grid -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 lg:gap-8">
                
                <!-- Left Column - Employee & Salary Info -->
                <div class="lg:col-span-2 space-y-6">
                    
                    <!-- Employee Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                        <div class="bg-gradient-to-r from-blue-500 to-indigo-600 px-6 py-8">
                            <div class="flex items-center">
                                <div class="flex-shrink-0">
                                    <div class="w-20 h-20 bg-white/20 backdrop-blur-sm rounded-full flex items-center justify-center border-2 border-white/30">
                                        <span class="text-3xl font-bold text-white">
                                            {{ substr($gaji->karyawan->nama ?? 'U', 0, 1) }}
                                        </span>
                                    </div>
                                </div>
                                <div class="ml-6">
                                    <h2 class="text-2xl font-bold text-white">
                                        {{ $gaji->karyawan->nama ?? 'Nama Tidak Tersedia' }}
                                    </h2>
                                    <p class="text-blue-100 mt-1">
                                        ID Karyawan: {{ $gaji->karyawan->id_karyawan ?? '-' }}
                                    </p>
                                    <div class="flex items-center mt-2">
                                        <div class="w-2 h-2 bg-green-400 rounded-full mr-2"></div>
                                        <span class="text-blue-100 text-sm">Aktif</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Salary Information Cards -->
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <!-- Weekly Salary -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Gaji Mingguan</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-500">Per minggu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-3xl font-bold text-green-600 dark:text-green-400">
                                    Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}
                                </p>
                                <div class="mt-2 flex items-center text-sm">
                                    <span class="text-gray-500 dark:text-gray-400">≈ Rp {{ number_format($gaji->mingguan / 7, 0, ',', '.') }} /hari</span>
                                </div>
                            </div>
                        </div>

                        <!-- Monthly Salary -->
                        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
                            <div class="flex items-center justify-between">
                                <div>
                                    <div class="flex items-center">
                                        <div class="w-10 h-10 bg-blue-100 dark:bg-blue-900/30 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                            </svg>
                                        </div>
                                        <div>
                                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Statistik Bulanan</p>
                                            <p class="text-xs text-gray-500 dark:text-gray-500">Per bulan</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-4">
                                <p class="text-3xl font-bold text-blue-600 dark:text-blue-400">
                                    Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}
                                </p>
                                <div class="mt-2 flex items-center text-sm">
                                    @php
                                        $ratio = $gaji->mingguan > 0 ? round($gaji->statistik_dalam_bulanan / $gaji->mingguan, 1) : 0;
                                    @endphp
                                    <span class="text-gray-500 dark:text-gray-400">{{ $ratio }}x gaji mingguan</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Reference Data Section -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                </svg>
                                Data Referensi
                            </h3>
                        </div>
                        <div class="p-6">
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                                <!-- Attendance Data -->
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900/30 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900 dark:text-white">Data Absensi</h4>
                                    </div>
                                    @if($gaji->absensi)
                                        <div class="ml-11 space-y-2">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600 dark:text-gray-400">Tanggal:</span>
                                                <span class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $gaji->absensi->tanggal->format('d F Y') }}
                                                </span>
                                            </div>
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600 dark:text-gray-400">Status:</span>
                                                @if($gaji->absensi->hadir ?? false)
                                                    <span class="inline-flex px-2 py-1 text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300 rounded-full">
                                                        Hadir
                                                    </span>
                                                @elseif($gaji->absensi->izin ?? false)
                                                    <span class="inline-flex px-2 py-1 text-xs font-medium bg-yellow-100 dark:bg-yellow-900/30 text-yellow-800 dark:text-yellow-300 rounded-full">
                                                        Izin
                                                    </span>
                                                @else
                                                    <span class="inline-flex px-2 py-1 text-xs font-medium bg-red-100 dark:bg-red-900/30 text-red-800 dark:text-red-300 rounded-full">
                                                        Tidak Hadir
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                    @else
                                        <p class="ml-11 text-sm text-gray-500 dark:text-gray-400">Data tidak tersedia</p>
                                    @endif
                                </div>

                                <!-- Weight Data -->
                                <div class="space-y-3">
                                    <div class="flex items-center">
                                        <div class="w-8 h-8 bg-orange-100 dark:bg-orange-900/30 rounded-lg flex items-center justify-center mr-3">
                                            <svg class="w-4 h-4 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                                            </svg>
                                        </div>
                                        <h4 class="font-medium text-gray-900 dark:text-white">Data Timbangan</h4>
                                    </div>
                                    @if($gaji->timbangan)
                                        <div class="ml-11 space-y-2">
                                            <div class="flex justify-between items-center">
                                                <span class="text-sm text-gray-600 dark:text-gray-400">Tanggal:</span>
                                                <span class="text-sm font-medium text-gray-900 dark:text-white">
                                                    {{ $gaji->timbangan->tanggal->format('d F Y') }}
                                                </span>
                                            </div>
                                            @if(isset($gaji->timbangan->nama_penjual))
                                                <div class="flex justify-between items-center">
                                                    <span class="text-sm text-gray-600 dark:text-gray-400">Penjual:</span>
                                                    <span class="text-sm font-medium text-gray-900 dark:text-white">
                                                        {{ $gaji->timbangan->nama_penjual }}
                                                    </span>
                                                </div>
                                            @endif
                                        </div>
                                    @else
                                        <p class="ml-11 text-sm text-gray-500 dark:text-gray-400">Data tidak tersedia</p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column - Quick Stats & Actions -->
                <div class="space-y-6">
                    
                    <!-- Quick Stats Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Statistik Cepat
                            </h3>
                        </div>
                        <div class="p-6 space-y-4">
                            <!-- Annual Projection -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Proyeksi Tahunan</p>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($gaji->statistik_dalam_bulanan * 12, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="w-10 h-10 bg-indigo-100 dark:bg-indigo-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-indigo-600 dark:text-indigo-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Daily Rate -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Rata-rata Harian</p>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format($gaji->statistik_dalam_bulanan / 30, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="w-10 h-10 bg-green-100 dark:bg-green-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>

                            <!-- Hourly Rate (assuming 8 hours/day) -->
                            <div class="flex items-center justify-between p-3 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                <div>
                                    <p class="text-sm text-gray-600 dark:text-gray-400">Tarif per Jam</p>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white">
                                        Rp {{ number_format(($gaji->statistik_dalam_bulanan / 30) / 8, 0, ',', '.') }}
                                    </p>
                                    <p class="text-xs text-gray-500 dark:text-gray-500">*Asumsi 8 jam/hari</p>
                                </div>
                                <div class="w-10 h-10 bg-yellow-100 dark:bg-yellow-900/30 rounded-lg flex items-center justify-center">
                                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Print Report Card -->
                    <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700">
                        <div class="px-6 py-4 border-b border-gray-200 dark:border-gray-700">
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                <svg class="w-5 h-5 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                </svg>
                                Cetak Laporan
                            </h3>
                        </div>
                        <div class="p-6">
                            <p class="text-sm text-gray-600 dark:text-gray-400 mb-4">
                                Cetak laporan detail gaji dalam format yang rapi dan profesional
                            </p>
                            <button onclick="printSalaryReport()" 
                                    id="printButton"
                                    class="w-full inline-flex items-center justify-center px-4 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                                </svg>
                                <span class="print-text">Cetak Laporan Gaji</span>
                            </button>
                        </div>
                    </div>

                    <!-- System Info Card -->
                    <div class="bg-gray-50 dark:bg-gray-700/50 rounded-xl border border-gray-200 dark:border-gray-600 p-6">
                        <h4 class="text-sm font-semibold text-gray-900 dark:text-white mb-3 flex items-center">
                            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            Informasi Sistem
                        </h4>
                        <div class="space-y-2 text-sm text-gray-600 dark:text-gray-400">
                            <div class="flex justify-between">
                                <span>ID Gaji:</span>
                                <span class="font-mono">{{ $gaji->id ?? 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Dibuat:</span>
                                <span>{{ $gaji->created_at ? $gaji->created_at->format('d/m/Y H:i') : 'N/A' }}</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Terakhir Update:</span>
                                <span>{{ $gaji->updated_at ? $gaji->updated_at->format('d/m/Y H:i') : 'N/A' }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hidden Print Report Template -->
    <div id="printReport" style="display: none;">
        <div style="max-width: 100%; margin: 0; padding: 20px; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; font-size: 12px; line-height: 1.3;">
            <!-- Header -->
            <div style="text-align: center; border-bottom: 2px solid #2563eb; padding-bottom: 10px; margin-bottom: 15px;">
                <h1 style="font-size: 18px; font-weight: bold; color: #1f2937; margin: 0 0 5px 0;">LAPORAN DETAIL GAJI KARYAWAN</h1>
                <p style="font-size: 11px; color: #6b7280; margin: 0;">Tanggal Cetak: <span id="printDate"></span></p>
            </div>

            <!-- Employee Info & Salary in One Row -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <!-- Employee Info -->
                <div style="background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px; padding: 12px;">
                    <h2 style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0 0 8px 0; border-bottom: 1px solid #3b82f6; padding-bottom: 4px;">INFORMASI KARYAWAN</h2>
                    <table style="width: 100%; border-collapse: collapse; font-size: 11px;">
                        <tr>
                            <td style="padding: 3px 0; font-weight: 500; color: #374151; width: 80px;">Nama</td>
                            <td style="padding: 3px 0; color: #1f2937;">: {{ $gaji->karyawan->nama ?? 'Tidak Tersedia' }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0; font-weight: 500; color: #374151;">ID</td>
                            <td style="padding: 3px 0; color: #1f2937;">: {{ $gaji->karyawan->id_karyawan ?? 'Tidak Tersedia' }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0; font-weight: 500; color: #374151;">Status</td>
                            <td style="padding: 3px 0; color: #059669;">: Aktif</td>
                        </tr>
                    </table>
                </div>

                <!-- Primary Salary -->
                <div style="background: #f0f9ff; border: 1px solid #bae6fd; border-radius: 6px; padding: 12px;">
                    <h2 style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0 0 8px 0; border-bottom: 1px solid #3b82f6; padding-bottom: 4px;">GAJI UTAMA</h2>
                    <table style="width: 100%; border-collapse: collapse; font-size: 11px;">
                        <tr>
                            <td style="padding: 3px 0; font-weight: 500; color: #374151; width: 80px;">Mingguan</td>
                            <td style="padding: 3px 0; color: #1f2937; font-weight: 600;">: Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0; font-weight: 500; color: #374151;">Bulanan</td>
                            <td style="padding: 3px 0; color: #1f2937; font-weight: 600;">: Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}</td>
                        </tr>
                        <tr>
                            <td style="padding: 3px 0; font-weight: 500; color: #374151;">Tahunan</td>
                            <td style="padding: 3px 0; color: #6b7280;">: Rp {{ number_format($gaji->statistik_dalam_bulanan * 12, 0, ',', '.') }}</td>
                        </tr>
                    </table>
                </div>
            </div>

            <!-- Statistics Table -->
            <div style="background: #fefce8; border: 1px solid #fde047; border-radius: 6px; padding: 12px; margin-bottom: 15px;">
                <h2 style="font-size: 14px; font-weight: 600; color: #1f2937; margin: 0 0 8px 0; border-bottom: 1px solid #eab308; padding-bottom: 4px;">ANALISIS GAJI</h2>
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; font-size: 11px;">
                    <div style="text-align: center; padding: 8px; background: white; border-radius: 4px;">
                        <div style="font-weight: 500; color: #374151;">Rata-rata Harian</div>
                        <div style="font-weight: 600; color: #1f2937;">Rp {{ number_format($gaji->statistik_dalam_bulanan / 30, 0, ',', '.') }}</div>
                    </div>
                    <div style="text-align: center; padding: 8px; background: white; border-radius: 4px;">
                        <div style="font-weight: 500; color: #374151;">Tarif per Jam</div>
                        <div style="font-weight: 600; color: #1f2937;">Rp {{ number_format(($gaji->statistik_dalam_bulanan / 30) / 8, 0, ',', '.') }}</div>
                    </div>
                    <div style="text-align: center; padding: 8px; background: white; border-radius: 4px;">
                        <div style="font-weight: 500; color: #374151;">Rasio Bulanan</div>
                        <div style="font-weight: 600; color: #1f2937;">{{ $gaji->mingguan > 0 ? round($gaji->statistik_dalam_bulanan / $gaji->mingguan, 1) : 0 }}x Mingguan</div>
                    </div>
                </div>
            </div>

            <!-- Reference Data -->
            <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 15px; margin-bottom: 15px;">
                <!-- Attendance Data -->
                <div style="background: #f0fdf4; border: 1px solid #bbf7d0; border-radius: 6px; padding: 12px;">
                    <h3 style="font-size: 13px; font-weight: 600; color: #1f2937; margin: 0 0 6px 0;">DATA ABSENSI</h3>
                    @if($gaji->absensi)
                        <table style="width: 100%; font-size: 10px;">
                            <tr>
                                <td style="padding: 2px 0; color: #374151; width: 50px;">Tanggal:</td>
                                <td style="padding: 2px 0; color: #1f2937; font-weight: 500;">{{ $gaji->absensi->tanggal->format('d/m/Y') }}</td>
                            </tr>
                            <tr>
                                <td style="padding: 2px 0; color: #374151;">Status:</td>
                                <td style="padding: 2px 0; color: #1f2937; font-weight: 500;">
                                    @if($gaji->absensi->hadir ?? false)
                                        ✓ Hadir
                                    @elseif($gaji->absensi->izin ?? false)
                                        ⚠ Izin
                                    @else
                                        ✗ Tidak Hadir
                                    @endif
                                </td>
                            </tr>
                        </table>
                    @else
                        <p style="color: #6b7280; font-size: 10px; margin: 0;">Data tidak tersedia</p>
                    @endif
                </div>

                <!-- Weight Data -->
                <div style="background: #fef2f2; border: 1px solid #fecaca; border-radius: 6px; padding: 12px;">
                    <h3 style="font-size: 13px; font-weight: 600; color: #1f2937; margin: 0 0 6px 0;">DATA TIMBANGAN</h3>
                    @if($gaji->timbangan)
                        <table style="width: 100%; font-size: 10px;">
                            <tr>
                                <td style="padding: 2px 0; color: #374151; width: 50px;">Tanggal:</td>
                                <td style="padding: 2px 0; color: #1f2937; font-weight: 500;">{{ $gaji->timbangan->tanggal->format('d/m/Y') }}</td>
                            </tr>
                            @if(isset($gaji->timbangan->nama_penjual))
                                <tr>
                                    <td style="padding: 2px 0; color: #374151;">Penjual:</td>
                                    <td style="padding: 2px 0; color: #1f2937; font-weight: 500;">{{ $gaji->timbangan->nama_penjual }}</td>
                                </tr>
                            @endif
                        </table>
                    @else
                        <p style="color: #6b7280; font-size: 10px; margin: 0;">Data tidak tersedia</p>
                    @endif
                </div>
            </div>

            <!-- System Information - Compact -->
            <div style="background: #f3f4f6; border: 1px solid #d1d5db; border-radius: 6px; padding: 10px;">
                <div style="display: grid; grid-template-columns: 1fr 1fr 1fr; gap: 10px; font-size: 10px;">
                    <div>
                        <span style="color: #374151; font-weight: 500;">ID Gaji:</span>
                        <span style="color: #1f2937; font-family: monospace; margin-left: 5px;">{{ $gaji->id ?? 'N/A' }}</span>
                    </div>
                    <div>
                        <span style="color: #374151; font-weight: 500;">Dibuat:</span>
                        <span style="color: #1f2937; margin-left: 5px;">{{ $gaji->created_at ? $gaji->created_at->format('d/m/Y') : 'N/A' }}</span>
                    </div>
                    <div>
                        <span style="color: #374151; font-weight: 500;">Update:</span>
                        <span style="color: #1f2937; margin-left: 5px;">{{ $gaji->updated_at ? $gaji->updated_at->format('d/m/Y') : 'N/A' }}</span>
                    </div>
                </div>
            </div>

            <!-- Footer -->
            <div style="text-align: center; border-top: 1px solid #e5e7eb; padding-top: 8px; margin-top: 12px;">
                <p style="font-size: 9px; color: #6b7280; margin: 0;">
                    Laporan digenerate otomatis • Dicetak: <span id="printDateTime"></span>
                </p>
            </div>
        </div>
    </div>

    <!-- Print Styles -->
    <style>
        @media print {
            body * {
                visibility: hidden;
            }
            
            #printReport,
            #printReport * {
                visibility: visible;
            }
            
            #printReport {
                position: absolute;
                left: 0;
                top: 0;
                width: 100%;
                display: block !important;
            }
            
            @page {
                margin: 0.3in;
                size: A4;
            }
            
            /* Force single page */
            #printReport {
                page-break-inside: avoid;
                max-height: 10in;
                overflow: hidden;
            }
        }
    </style>

    <!-- Enhanced JavaScript for Print Report -->
    <script>
        // Enhanced print report function
        function printSalaryReport() {
            const printButton = document.getElementById('printButton');
            const printText = printButton.querySelector('.print-text');
            const originalText = printText.textContent;
            
            // Add loading state
            printButton.disabled = true;
            printButton.classList.add('opacity-75');
            printText.textContent = 'Menyiapkan Laporan...';
            
            // Set current date and time
            const now = new Date();
            const options = { 
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                timeZone: 'Asia/Jakarta'
            };
            const dateTimeOptions = {
                year: 'numeric', 
                month: 'long', 
                day: 'numeric',
                hour: '2-digit',
                minute: '2-digit',
                timeZone: 'Asia/Jakarta'
            };
            
            document.getElementById('printDate').textContent = now.toLocaleDateString('id-ID', options);
            document.getElementById('printDateTime').textContent = now.toLocaleString('id-ID', dateTimeOptions) + ' WIB';
            
            // Simulate preparation time and then print
            setTimeout(() => {
                window.print();
                
                // Reset button state
                printButton.disabled = false;
                printButton.classList.remove('opacity-75');
                printText.textContent = originalText;
            }, 1500);
        }

        document.addEventListener('DOMContentLoaded', function() {
            // Enhanced keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + P to print report
                if ((e.ctrlKey || e.metaKey) && e.key === 'p') {
                    e.preventDefault();
                    printSalaryReport();
                }
                
                // Escape to go back
                if (e.key === 'Escape') {
                    const backButton = document.querySelector('a[href*="index"]');
                    if (backButton) {
                        window.location.href = backButton.href;
                    }
                }
            });

            // Add subtle animations on scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-fade-in');
                    }
                });
            }, observerOptions);

            // Observe all cards for animation
            const cards = document.querySelectorAll('.bg-white, .bg-gradient-to-r');
            cards.forEach(card => {
                observer.observe(card);
            });

            // Show success message after successful actions
            const urlParams = new URLSearchParams(window.location.search);
            if (urlParams.get('success')) {
                const message = urlParams.get('success');
                if (message === 'updated') {
                    showNotification('Data gaji berhasil diperbarui!', 'success');
                } else if (message === 'created') {
                    showNotification('Data gaji berhasil ditambahkan!', 'success');
                }
            }
        });

        // Simple notification system
        function showNotification(message, type = 'info') {
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 z-50 px-6 py-3 rounded-lg shadow-lg transition-all duration-300 transform translate-x-full ${
                type === 'success' ? 'bg-green-500 text-white' :
                type === 'error' ? 'bg-red-500 text-white' :
                type === 'warning' ? 'bg-yellow-500 text-black' :
                'bg-blue-500 text-white'
            }`;
            
            notification.innerHTML = `
                <div class="flex items-center">
                    <span class="mr-2">${
                        type === 'success' ? '✅' :
                        type === 'error' ? '❌' :
                        type === 'warning' ? '⚠️' :
                        'ℹ️'
                    }</span>
                    <span>${message}</span>
                    <button class="ml-4 hover:opacity-75" onclick="this.parentElement.parentElement.remove()">
                        ✕
                    </button>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            // Animate in
            setTimeout(() => {
                notification.classList.remove('translate-x-full');
            }, 100);
            
            // Auto remove after 5 seconds
            setTimeout(() => {
                notification.classList.add('translate-x-full');
                setTimeout(() => {
                    if (notification.parentNode) {
                        notification.remove();
                    }
                }, 300);
            }, 5000);
        }
    </script>

    <!-- Add CSS for fade-in animation -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out;
        }
        
        /* Hover effects for cards */
        .bg-white:hover,
        .dark .dark\:bg-gray-800:hover {
            transform: translateY(-1px);
            transition: transform 0.2s ease-out;
        }
        
        /* Custom scrollbar for better UX */
        ::-webkit-scrollbar {
            width: 8px;
        }
        
        ::-webkit-scrollbar-track {
            background: #f1f5f9;
        }
        
        ::-webkit-scrollbar-thumb {
            background: #cbd5e1;
            border-radius: 4px;
        }
        
        ::-webkit-scrollbar-thumb:hover {
            background: #94a3b8;
        }
        
        .dark ::-webkit-scrollbar-track {
            background: #374151;
        }
        
        .dark ::-webkit-scrollbar-thumb {
            background: #6b7280;
        }
        
        .dark ::-webkit-scrollbar-thumb:hover {
            background: #9ca3af;
        }
    </style>
</x-app-layout>