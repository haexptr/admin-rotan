<x-app-layout>
    @section('title', 'Detail Karyawan')

    <div class="max-w-4xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Detail Karyawan</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Informasi lengkap karyawan</p>
            </div>
            <div class="flex items-center space-x-3">
                <a href="{{ route('karyawans.edit', $karyawan->id_karyawan) }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Edit
                </a>
                <a href="{{ route('karyawans.index') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>
        </div>

        <!-- Employee Profile Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <!-- Profile Header -->
            <div class="bg-gradient-to-r from-blue-500 to-blue-600 px-6 py-8">
                <div class="flex items-center space-x-4">
                    <div class="h-16 w-16 rounded-full bg-white/20 flex items-center justify-center">
                        <span class="text-2xl font-bold text-white">
                            {{ strtoupper(substr($karyawan->nama, 0, 2)) }}
                        </span>
                    </div>
                    <div>
                        <h2 class="text-2xl font-bold text-white">{{ $karyawan->nama }}</h2>
                        <p class="text-blue-100">Karyawan ID: {{ $karyawan->id_karyawan }}</p>
                    </div>
                </div>
            </div>

            <!-- Profile Content -->
            <div class="p-6">
                <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                    <!-- Personal Information -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                </svg>
                                Informasi Personal
                            </h3>
                            
                            <div class="space-y-4">
                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">
                                        Nama Lengkap
                                    </label>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white">{{ $karyawan->nama }}</p>
                                </div>

                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">
                                        Nomor Telepon
                                    </label>
                                    <p class="text-sm font-medium text-gray-900 dark:text-white flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        {{ $karyawan->no_telp }}
                                    </p>
                                </div>

                                <div class="p-4 bg-gray-50 dark:bg-gray-700/50 rounded-lg">
                                    <label class="block text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide mb-1">
                                        Alamat
                                    </label>
                                    <p class="text-sm text-gray-900 dark:text-white leading-relaxed flex items-start">
                                        <svg class="w-4 h-4 mr-2 text-gray-400 mt-0.5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        </svg>
                                        {{ $karyawan->alamat }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Weight Information -->
                    <div class="space-y-6">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-gray-600 dark:text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                </svg>
                                Informasi Timbangan
                            </h3>

                            <div class="grid grid-cols-1 gap-4">
                                <!-- Timbangan In -->
                                <div class="p-4 bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-xs font-medium text-green-600 dark:text-green-400 uppercase tracking-wide mb-1">
                                                Timbangan Masuk
                                            </label>
                                            <p class="text-2xl font-bold text-green-700 dark:text-green-300">
                                                {{ $karyawan->memuat_timbangan_in ? number_format($karyawan->memuat_timbangan_in, 2, ',', '.') : '0,00' }}
                                                <span class="text-sm font-normal text-green-600 dark:text-green-400">Kg</span>
                                            </p>
                                        </div>
                                        <div class="p-3 bg-green-100 dark:bg-green-800 rounded-lg">
                                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Timbangan Out -->
                                <div class="p-4 bg-orange-50 dark:bg-orange-900/20 border border-orange-200 dark:border-orange-800 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-xs font-medium text-orange-600 dark:text-orange-400 uppercase tracking-wide mb-1">
                                                Timbangan Keluar
                                            </label>
                                            <p class="text-2xl font-bold text-orange-700 dark:text-orange-300">
                                                {{ $karyawan->memuat_timbangan_out ? number_format($karyawan->memuat_timbangan_out, 2, ',', '.') : '0,00' }}
                                                <span class="text-sm font-normal text-orange-600 dark:text-orange-400">Kg</span>
                                            </p>
                                        </div>
                                        <div class="p-3 bg-orange-100 dark:bg-orange-800 rounded-lg">
                                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Net Weight -->
                                @php
                                    $netWeight = ($karyawan->memuat_timbangan_in ?? 0) - ($karyawan->memuat_timbangan_out ?? 0);
                                @endphp
                                <div class="p-4 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg">
                                    <div class="flex items-center justify-between">
                                        <div>
                                            <label class="block text-xs font-medium text-blue-600 dark:text-blue-400 uppercase tracking-wide mb-1">
                                                Selisih Berat
                                            </label>
                                            <p class="text-2xl font-bold text-blue-700 dark:text-blue-300">
                                                {{ number_format($netWeight, 2, ',', '.') }}
                                                <span class="text-sm font-normal text-blue-600 dark:text-blue-400">Kg</span>
                                            </p>
                                        </div>
                                        <div class="p-3 bg-blue-100 dark:bg-blue-800 rounded-lg">
                                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Quick Actions -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 p-6">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-4">Aksi Cepat</h3>
            <div class="flex flex-wrap gap-3">
                <a href="{{ route('karyawans.edit', $karyawan->id_karyawan) }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium text-blue-700 dark:text-blue-300 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                    </svg>
                    Edit Data
                </a>
                
                <button onclick="window.print()" 
                        class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-gray-50 dark:bg-gray-700 border border-gray-200 dark:border-gray-600 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                    </svg>
                    Print
                </button>
            </div>
        </div>
    </div>
</x-app-layout>