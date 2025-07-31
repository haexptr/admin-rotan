<x-app-layout>
    @section('title', 'Tambah Gaji')

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">
                            Tambah Gaji Baru
                        </h1>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Isi form di bawah untuk menambahkan data gaji karyawan
                        </p>
                    </div>
                    
                    <!-- Back Button -->
                    <a href="{{ route('gajis.index') }}" 
                       class="inline-flex items-center px-4 py-2.5 bg-gray-600 hover:bg-gray-700 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-8 sm:px-8">
                    <form action="{{ route('gajis.store') }}" method="POST" class="space-y-8" id="salaryForm">
                        @csrf
                        
                        <!-- Employee Selection Section -->
                        <div class="space-y-6">
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-sm font-bold text-blue-600 dark:text-blue-400">1</span>
                                    </div>
                                    Pilih Karyawan
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">Pilih karyawan yang akan ditambahkan data gajinya</p>
                            </div>
                            
                            <div class="ml-11">
                                <label for="id_karyawan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                    Nama Karyawan <span class="text-red-500">*</span>
                                </label>
                                <div class="relative">
                                    <select name="id_karyawan" 
                                            id="id_karyawan" 
                                            class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                            required>
                                        <option value="" class="text-gray-500">-- Pilih Karyawan --</option>
                                        @foreach($karyawans as $karyawan)
                                            <option value="{{ $karyawan->id_karyawan }}" 
                                                    {{ old('id_karyawan') == $karyawan->id_karyawan ? 'selected' : '' }}>
                                                {{ $karyawan->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                        </svg>
                                    </div>
                                </div>
                                @error('id_karyawan')
                                    <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                        <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Data References Section -->
                        <div class="space-y-6">
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                    <div class="w-8 h-8 bg-green-100 dark:bg-green-900/30 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-sm font-bold text-green-600 dark:text-green-400">2</span>
                                    </div>
                                    Data Referensi
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">Pilih data absensi dan timbangan terkait</p>
                            </div>
                            
                            <div class="ml-11 grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Data Absensi -->
                                <div>
                                    <label for="id_absensi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Data Absensi <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select name="id_absensi" 
                                                id="id_absensi" 
                                                class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                                required>
                                            <option value="" class="text-gray-500">-- Pilih Data Absensi --</option>
                                            @foreach($absensis as $absensi)
                                                <option value="{{ $absensi->id_absensi }}" 
                                                        {{ old('id_absensi') == $absensi->id_absensi ? 'selected' : '' }}>
                                                    {{ $absensi->karyawan->nama ?? 'Unknown' }} - {{ $absensi->tanggal->format('d/m/Y') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('id_absensi')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Data Timbangan -->
                                <div>
                                    <label for="id_timbangan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Data Timbangan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <select name="id_timbangan" 
                                                id="id_timbangan" 
                                                class="w-full px-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                                required>
                                            <option value="" class="text-gray-500">-- Pilih Data Timbangan --</option>
                                            @foreach($timbangans as $timbangan)
                                                <option value="{{ $timbangan->id_timbangan }}" 
                                                        {{ old('id_timbangan') == $timbangan->id_timbangan ? 'selected' : '' }}>
                                                    {{ $timbangan->karyawan->nama ?? 'Unknown' }} - {{ $timbangan->tanggal->format('d/m/Y') }}
                                                </option>
                                            @endforeach
                                        </select>
                                        <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                                            <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                                            </svg>
                                        </div>
                                    </div>
                                    @error('id_timbangan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Salary Information Section -->
                        <div class="space-y-6">
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                    <div class="w-8 h-8 bg-purple-100 dark:bg-purple-900/30 rounded-full flex items-center justify-center mr-3">
                                        <span class="text-sm font-bold text-purple-600 dark:text-purple-400">3</span>
                                    </div>
                                    Informasi Gaji
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">Masukkan nominal gaji mingguan dan bulanan</p>
                            </div>
                            
                            <div class="ml-11 grid grid-cols-1 lg:grid-cols-2 gap-6">
                                <!-- Gaji Mingguan -->
                                <div>
                                    <label for="mingguan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Gaji Mingguan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 dark:text-gray-400 text-sm font-medium">Rp</span>
                                        </div>
                                        <input type="number" 
                                               name="mingguan" 
                                               id="mingguan" 
                                               value="{{ old('mingguan', 0) }}" 
                                               min="0"
                                               step="1000"
                                               class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                               placeholder="0"
                                               required>
                                    </div>
                                    @error('mingguan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Gaji Bulanan -->
                                <div>
                                    <label for="statistik_dalam_bulanan" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">
                                        Statistik Gaji Bulanan <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                            <span class="text-gray-500 dark:text-gray-400 text-sm font-medium">Rp</span>
                                        </div>
                                        <input type="number" 
                                               name="statistik_dalam_bulanan" 
                                               id="statistik_dalam_bulanan" 
                                               value="{{ old('statistik_dalam_bulanan', 0) }}" 
                                               min="0"
                                               step="1000"
                                               class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                               placeholder="0"
                                               required>
                                    </div>
                                    @error('statistik_dalam_bulanan')
                                        <p class="mt-2 text-sm text-red-600 dark:text-red-400 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Info Card -->
                        <div class="bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-lg p-6">
                            <div class="flex items-start">
                                <div class="flex-shrink-0">
                                    <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                                    </svg>
                                </div>
                                <div class="ml-4">
                                    <h4 class="text-sm font-semibold text-blue-800 dark:text-blue-300 mb-1">Tips Pengisian</h4>
                                    <ul class="text-sm text-blue-700 dark:text-blue-300 space-y-1">
                                        <li>• Pastikan data absensi dan timbangan sesuai dengan karyawan yang dipilih</li>
                                        <li>• Gaji bulanan biasanya adalah 4x gaji mingguan</li>
                                        <li>• Gunakan angka bulat tanpa koma atau titik</li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <div class="flex flex-col sm:flex-row gap-3">
                                <button type="submit" 
                                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="button-text">Simpan Data Gaji</span>
                                </button>
                                <a href="{{ route('gajis.index') }}" 
                                   class="inline-flex items-center justify-center px-6 py-3 bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </a>
                            </div>
                            
                            <!-- Progress Indicator -->
                            <div class="flex items-center space-x-2 text-sm text-gray-500 dark:text-gray-400">
                                <div class="flex space-x-1">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full"></div>
                                    <div class="w-2 h-2 bg-green-500 rounded-full"></div>
                                    <div class="w-2 h-2 bg-purple-500 rounded-full"></div>
                                </div>
                                <span>3 Langkah</span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Auto-calculate Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('salaryForm');
            const mingguanInput = document.getElementById('mingguan');
            const bulananInput = document.getElementById('statistik_dalam_bulanan');
            const submitButton = form.querySelector('button[type="submit"]');
            const buttonText = submitButton.querySelector('.button-text');

            // Auto calculate monthly from weekly salary
            mingguanInput.addEventListener('input', function() {
                const mingguanValue = parseFloat(this.value) || 0;
                const bulananValue = mingguanValue * 4;
                bulananInput.value = bulananValue;
                
                // Add subtle animation to indicate auto-fill
                if (mingguanValue > 0) {
                    bulananInput.classList.add('ring-2', 'ring-green-500');
                    setTimeout(() => {
                        bulananInput.classList.remove('ring-2', 'ring-green-500');
                    }, 1000);
                }
            });

            // Format number inputs on blur
            function formatNumberInput(input) {
                input.addEventListener('blur', function() {
                    const value = parseFloat(this.value);
                    if (!isNaN(value)) {
                        this.value = Math.round(value);
                    }
                });
            }

            formatNumberInput(mingguanInput);
            formatNumberInput(bulananInput);

            // Enhanced form submission with loading state
            form.addEventListener('submit', function(e) {
                submitButton.disabled = true;
                submitButton.classList.add('opacity-75');
                buttonText.innerHTML = `
                    <svg class="animate-spin w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;
            });

            // Add thousand separators for better UX (optional)
            function addThousandSeparator(input) {
                input.addEventListener('input', function() {
                    let value = this.value.replace(/[^\d]/g, '');
                    if (value) {
                        // Don't format while typing, only show raw number
                        this.value = value;
                    }
                });
            }

            addThousandSeparator(mingguanInput);
            addThousandSeparator(bulananInput);
        });
    </script>
</x-app-layout>