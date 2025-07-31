<x-app-layout>
    @section('title', 'Edit Karyawan')

    <div class="max-w-2xl mx-auto space-y-6">
        <!-- Header -->
        <div class="flex items-center justify-between">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Edit Karyawan</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Perbarui data karyawan: <span class="font-medium">{{ $karyawan->nama }}</span></p>
            </div>
            <a href="{{ route('karyawans.index') }}" 
               class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                </svg>
                Kembali
            </a>
        </div>

        <!-- Current Data Preview -->
        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
            <div class="flex items-center">
                <div class="h-10 w-10 rounded-full bg-blue-100 dark:bg-blue-800 flex items-center justify-center mr-3">
                    <span class="text-sm font-medium text-blue-600 dark:text-blue-300">
                        {{ strtoupper(substr($karyawan->nama, 0, 2)) }}
                    </span>
                </div>
                <div>
                    <p class="text-sm font-medium text-blue-900 dark:text-blue-100">{{ $karyawan->nama }}</p>
                    <p class="text-xs text-blue-600 dark:text-blue-300">ID: {{ $karyawan->id_karyawan }}</p>
                </div>
            </div>
        </div>

        <!-- Form Card -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
            <div class="p-6">
                <form action="{{ route('karyawans.update', $karyawan->id_karyawan) }}" method="POST" class="space-y-6">
                    @csrf 
                    @method('PUT')

                    <!-- Personal Information Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">
                            Informasi Personal
                        </h3>

                        <!-- Nama -->
                        <div class="space-y-2">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nama Lengkap
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="text" 
                                   name="nama" 
                                   id="nama" 
                                   value="{{ old('nama', $karyawan->nama) }}"
                                   placeholder="Masukkan nama lengkap"
                                   class="w-full px-3 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200"
                                   required>
                            @error('nama')
                                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="space-y-2">
                            <label for="alamat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Alamat
                                <span class="text-red-500">*</span>
                            </label>
                            <textarea name="alamat" 
                                      id="alamat" 
                                      rows="3"
                                      placeholder="Masukkan alamat lengkap"
                                      class="w-full px-3 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 resize-none"
                                      required>{{ old('alamat', $karyawan->alamat) }}</textarea>
                            @error('alamat')
                                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- No Telepon -->
                        <div class="space-y-2">
                            <label for="no_telp" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                Nomor Telepon
                                <span class="text-red-500">*</span>
                            </label>
                            <input type="tel" 
                                   name="no_telp" 
                                   id="no_telp" 
                                   value="{{ old('no_telp', $karyawan->no_telp) }}"
                                   placeholder="Contoh: 08123456789"
                                   class="w-full px-3 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200"
                                   required>
                            @error('no_telp')
                                <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>

                    <!-- Weight Information Section -->
                    <div class="space-y-4">
                        <h3 class="text-lg font-medium text-gray-900 dark:text-white border-b border-gray-200 dark:border-gray-700 pb-2">
                            Informasi Timbangan
                        </h3>

                        <!-- Current vs New Comparison -->
                        <div class="bg-gray-50 dark:bg-gray-700/50 rounded-lg p-4 mb-4">
                            <h4 class="text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Data Saat Ini:</h4>
                            <div class="grid grid-cols-2 gap-4 text-xs">
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Timbangan In:</span>
                                    <span class="font-medium text-gray-900 dark:text-white ml-1">
                                        {{ $karyawan->memuat_timbangan_in ? number_format($karyawan->memuat_timbangan_in, 2, ',', '.') : '0,00' }} Kg
                                    </span>
                                </div>
                                <div>
                                    <span class="text-gray-500 dark:text-gray-400">Timbangan Out:</span>
                                    <span class="font-medium text-gray-900 dark:text-white ml-1">
                                        {{ $karyawan->memuat_timbangan_out ? number_format($karyawan->memuat_timbangan_out, 2, ',', '.') : '0,00' }} Kg
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <!-- Timbangan In -->
                            <div class="space-y-2">
                                <label for="memuat_timbangan_in" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Timbangan Masuk (Kg)
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           step="0.01"
                                           min="0"
                                           name="memuat_timbangan_in" 
                                           id="memuat_timbangan_in" 
                                           value="{{ old('memuat_timbangan_in', $karyawan->memuat_timbangan_in) }}"
                                           placeholder="0.00"
                                           class="w-full px-3 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400">Kg</span>
                                </div>
                                @error('memuat_timbangan_in')
                                    <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>

                            <!-- Timbangan Out -->
                            <div class="space-y-2">
                                <label for="memuat_timbangan_out" class="block text-sm font-medium text-gray-700 dark:text-gray-300">
                                    Timbangan Keluar (Kg)
                                </label>
                                <div class="relative">
                                    <input type="number" 
                                           step="0.01"
                                           min="0"
                                           name="memuat_timbangan_out" 
                                           id="memuat_timbangan_out" 
                                           value="{{ old('memuat_timbangan_out', $karyawan->memuat_timbangan_out) }}"
                                           placeholder="0.00"
                                           class="w-full px-3 py-2.5 text-sm border border-gray-300 dark:border-gray-600 rounded-lg bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200">
                                    <span class="absolute right-3 top-1/2 transform -translate-y-1/2 text-xs text-gray-500 dark:text-gray-400">Kg</span>
                                </div>
                                @error('memuat_timbangan_out')
                                    <p class="text-xs text-red-600 dark:text-red-400">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Live Weight Difference Calculator -->
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-4">
                            <div class="flex items-center justify-between">
                                <div>
                                    <label class="block text-xs font-medium text-blue-600 dark:text-blue-400 uppercase tracking-wide mb-1">
                                        Selisih Berat (Preview)
                                    </label>
                                    <p class="text-lg font-bold text-blue-700 dark:text-blue-300" id="weightDifference">
                                        0,00 <span class="text-sm font-normal">Kg</span>
                                    </p>
                                </div>
                                <div class="p-2 bg-blue-100 dark:bg-blue-800 rounded-lg">
                                    <svg class="w-5 h-5 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                    </svg>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Action Buttons -->
                    <div class="flex items-center justify-end space-x-3 pt-6 border-t border-gray-200 dark:border-gray-700">
                        <a href="{{ route('karyawans.index') }}" 
                           class="px-4 py-2.5 text-sm font-medium text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-600 transition-colors duration-200">
                            Batal
                        </a>
                        <a href="{{ route('karyawans.show', $karyawan->id_karyawan) }}" 
                           class="px-4 py-2.5 text-sm font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800 rounded-lg hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-200">
                            Preview
                        </a>
                        <button type="submit" 
                                class="px-6 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            <span class="flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Karyawan
                            </span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript for Live Weight Calculation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const weightInInput = document.getElementById('memuat_timbangan_in');
            const weightOutInput = document.getElementById('memuat_timbangan_out');
            const weightDifferenceDisplay = document.getElementById('weightDifference');

            function calculateWeightDifference() {
                const weightIn = parseFloat(weightInInput.value) || 0;
                const weightOut = parseFloat(weightOutInput.value) || 0;
                const difference = weightIn - weightOut;
                
                weightDifferenceDisplay.innerHTML = 
                    difference.toLocaleString('id-ID', { minimumFractionDigits: 2, maximumFractionDigits: 2 }) + 
                    ' <span class="text-sm font-normal">Kg</span>';
                
                // Change color based on difference
                const container = weightDifferenceDisplay.closest('.bg-blue-50, .dark\\:bg-blue-900\\/20');
                if (difference > 0) {
                    weightDifferenceDisplay.className = 'text-lg font-bold text-green-700 dark:text-green-300';
                } else if (difference < 0) {
                    weightDifferenceDisplay.className = 'text-lg font-bold text-red-700 dark:text-red-300';
                } else {
                    weightDifferenceDisplay.className = 'text-lg font-bold text-blue-700 dark:text-blue-300';
                }
            }

            // Calculate on page load
            calculateWeightDifference();

            // Calculate on input change
            weightInInput.addEventListener('input', calculateWeightDifference);
            weightOutInput.addEventListener('input', calculateWeightDifference);
        });
    </script>
</x-app-layout>