<x-app-layout>
    @section('title', 'Dashboard')

    <div class="space-y-4">
        <!-- Welcome Card - PERBAIKAN: lebih compact -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <h2 class="text-xl font-bold text-gray-900 mb-1">Selamat Datang, {{ Auth::user()->name }}!</h2>
            <p class="text-gray-600 text-sm">Sistem Manajemen Admin Rotan - {{ date('d F Y') }}</p>
        </div>

        <!-- Stats Cards - PERBAIKAN: grid lebih compact -->
        <div class="grid grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Karyawan -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Karyawan</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalKaryawan ?? 0 }}</p>
            </div>

            <!-- Total Timbangan -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Timbangan</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalTimbangan ?? 0 }}</p>
            </div>

            <!-- Total Absensi -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Absensi</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">{{ $totalAbsensi ?? 0 }}</p>
            </div>

            <!-- Total Gaji -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
                <h3 class="text-xs font-medium text-gray-500 uppercase tracking-wide">Total Gaji</h3>
                <p class="text-2xl font-bold text-gray-900 mt-1">Rp {{ number_format($totalGaji ?? 0, 0, ',', '.') }}</p>
            </div>
        </div>

        <!-- Quick Actions - PERBAIKAN: layout lebih minimalis -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-4">
            <h3 class="text-lg font-semibold text-gray-900 mb-3">Aksi Cepat</h3>
            <div class="grid grid-cols-2 lg:grid-cols-4 gap-3">
                <a href="{{ route('karyawans.create') }}" 
                   class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-blue-600 rounded-full flex items-center justify-center mb-2">
                        <span class="text-white text-sm">+</span>
                    </div>
                    <span class="text-xs font-medium text-gray-700 text-center">Tambah Karyawan</span>
                </a>

                <a href="{{ route('timbangans.create') }}" 
                   class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-green-600 rounded-full flex items-center justify-center mb-2">
                        <span class="text-white text-sm">+</span>
                    </div>
                    <span class="text-xs font-medium text-gray-700 text-center">Input Timbangan</span>
                </a>

                <a href="{{ route('absensis.create') }}" 
                   class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-purple-600 rounded-full flex items-center justify-center mb-2">
                        <span class="text-white text-sm">+</span>
                    </div>
                    <span class="text-xs font-medium text-gray-700 text-center">Catat Absensi</span>
                </a>

                <a href="{{ route('gajis.create') }}" 
                   class="flex flex-col items-center justify-center p-3 border border-gray-200 rounded-lg hover:bg-gray-50 transition-colors">
                    <div class="w-8 h-8 bg-yellow-600 rounded-full flex items-center justify-center mb-2">
                        <span class="text-white text-sm">+</span>
                    </div>
                    <span class="text-xs font-medium text-gray-700 text-center">Hitung Gaji</span>
                </a>
            </div>
        </div>
    </div>
</x-app-layout>