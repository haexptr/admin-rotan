<x-app-layout>
    @section('title', 'Edit Gaji')

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 py-6 sm:py-8">
            
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold text-gray-900 dark:text-white">
                            Edit Gaji Karyawan
                        </h1>
                        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
                            Update informasi gaji untuk {{ $gaji->karyawan->nama ?? 'Karyawan' }}
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

            <!-- Current Data Summary Card -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 dark:from-blue-900/20 dark:to-indigo-900/20 rounded-xl border border-blue-200 dark:border-blue-800 p-6 mb-8">
                <div class="flex items-start">
                    <div class="flex-shrink-0">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center">
                            <span class="text-lg font-bold text-white">
                                {{ substr($gaji->karyawan->nama ?? 'U', 0, 1) }}
                            </span>
                        </div>
                    </div>
                    <div class="ml-4 flex-1">
                        <h3 class="text-lg font-semibold text-blue-900 dark:text-blue-100 mb-2">
                            Data Gaji Saat Ini
                        </h3>
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                            <div class="bg-white/50 dark:bg-gray-800/50 rounded-lg p-3">
                                <p class="text-xs font-medium text-blue-600 dark:text-blue-400 uppercase tracking-wide">Mingguan</p>
                                <p class="text-lg font-bold text-blue-900 dark:text-blue-100">
                                    Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}
                                </p>
                            </div>
                            <div class="bg-white/50 dark:bg-gray-800/50 rounded-lg p-3">
                                <p class="text-xs font-medium text-blue-600 dark:text-blue-400 uppercase tracking-wide">Bulanan</p>
                                <p class="text-lg font-bold text-blue-900 dark:text-blue-100">
                                    Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Main Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 overflow-hidden">
                <div class="px-6 py-8 sm:px-8">
                    <form action="{{ route('gajis.update', $gaji) }}" method="POST" class="space-y-8" id="editSalaryForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- Employee Selection Section -->
                        <div class="space-y-6">
                            <div class="border-b border-gray-200 dark:border-gray-700 pb-4">
                                <h3 class="text-lg font-semibold text-gray-900 dark:text-white flex items-center">
                                    <div class="w-8 h-8 bg-blue-100 dark:bg-blue-900/30 rounded-full flex items-center justify-center mr-3">
                                        <svg class="w-4 h-4 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                        </svg>
                                    </div>
                                    Karyawan
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">Ubah karyawan jika diperlukan</p>
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
                                                    {{ old('id_karyawan', $gaji->id_karyawan) == $karyawan->id_karyawan ? 'selected' : '' }}>
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
                                        <svg class="w-4 h-4 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                    </div>
                                    Data Referensi
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">Update data absensi dan timbangan terkait</p>
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
                                                        {{ old('id_absensi', $gaji->id_absensi) == $absensi->id_absensi ? 'selected' : '' }}>
                                                    {{ $absensi->karyawan->nama ?? 'Unknown' }} - {{ $absensi->tanggal->format('d/m/Y') }}
                                                    @if($absensi->hadir)
                                                        (Hadir)
                                                    @elseif($absensi->izin)
                                                        (Izin)
                                                    @else
                                                        (Tidak Hadir)
                                                    @endif
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
                                                        {{ old('id_timbangan', $gaji->id_timbangan) == $timbangan->id_timbangan ? 'selected' : '' }}>
                                                    {{ $timbangan->karyawan->nama ?? 'Unknown' }} - {{ $timbangan->tanggal->format('d/m/Y') }} - {{ $timbangan->nama_penjual }}
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
                                        <svg class="w-4 h-4 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1"></path>
                                        </svg>
                                    </div>
                                    Informasi Gaji
                                </h3>
                                <p class="text-sm text-gray-600 dark:text-gray-400 ml-11">Update nominal gaji mingguan dan bulanan</p>
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
                                               value="{{ old('mingguan', $gaji->mingguan) }}" 
                                               min="0"
                                               step="1000"
                                               class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                               placeholder="0"
                                               required>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <div class="text-xs text-gray-400 bg-gray-100 dark:bg-gray-600 px-2 py-1 rounded">
                                                /minggu
                                            </div>
                                        </div>
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
                                               value="{{ old('statistik_dalam_bulanan', $gaji->statistik_dalam_bulanan) }}" 
                                               min="0"
                                               step="1000"
                                               class="w-full pl-10 pr-4 py-3 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-lg text-gray-900 dark:text-white focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-all duration-200" 
                                               placeholder="0"
                                               required>
                                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                            <div class="text-xs text-gray-400 bg-gray-100 dark:bg-gray-600 px-2 py-1 rounded">
                                                /bulan
                                            </div>
                                        </div>
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

                            <!-- Calculation Helper -->
                            <div class="ml-11 bg-yellow-50 dark:bg-yellow-900/20 border border-yellow-200 dark:border-yellow-800 rounded-lg p-4">
                                <div class="flex items-center">
                                    <svg class="w-5 h-5 text-yellow-600 dark:text-yellow-400 mr-2" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"></path>
                                    </svg>
                                    <p class="text-sm text-yellow-800 dark:text-yellow-200">
                                        <strong>Auto-kalkulasi:</strong> Gaji bulanan akan otomatis dihitung (4x gaji mingguan) saat Anda mengubah gaji mingguan
                                    </p>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-4 pt-6 border-t border-gray-200 dark:border-gray-700">
                            <!-- Main Actions -->
                            <div class="flex flex-col sm:flex-row gap-3 order-2 lg:order-1">
                                <button type="submit" 
                                        class="inline-flex items-center justify-center px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow-md">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    <span class="button-text">Update Data Gaji</span>
                                </button>
                                <a href="{{ route('gajis.index') }}" 
                                   class="inline-flex items-center justify-center px-6 py-3 bg-gray-300 dark:bg-gray-600 hover:bg-gray-400 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-all duration-200">
                                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Batal
                                </a>
                            </div>
                            
                            <!-- Delete Button -->
                            <div class="order-1 lg:order-2">
                                <form action="{{ route('gajis.destroy', $gaji) }}" 
                                      method="POST" 
                                      class="inline"
                                      onsubmit="return confirm('⚠️ Yakin ingin menghapus data gaji ini?\n\nData yang dihapus tidak dapat dikembalikan.')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="inline-flex items-center justify-center px-4 py-3 bg-red-600 hover:bg-red-700 text-white text-sm font-medium rounded-lg focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-all duration-200 shadow-sm hover:shadow-md">
                                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus Data
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced Auto-calculate Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.getElementById('editSalaryForm');
            const mingguanInput = document.getElementById('mingguan');
            const bulananInput = document.getElementById('statistik_dalam_bulanan');
            const submitButton = form.querySelector('button[type="submit"]');
            const buttonText = submitButton.querySelector('.button-text');

            // Store original values for comparison
            const originalMingguan = parseFloat(mingguanInput.value) || 0;
            const originalBulanan = parseFloat(bulananInput.value) || 0;

            // Auto calculate monthly from weekly salary
            mingguanInput.addEventListener('input', function() {
                const mingguanValue = parseFloat(this.value) || 0;
                const bulananValue = mingguanValue * 4;
                
                // Only auto-fill if the current monthly value seems to be 4x weekly
                // or if monthly field is empty/zero
                const currentBulanan = parseFloat(bulananInput.value) || 0;
                if (currentBulanan === 0 || currentBulanan === (originalMingguan * 4)) {
                    bulananInput.value = bulananValue;
                    
                    // Add visual feedback for auto-calculation
                    if (mingguanValue > 0) {
                        bulananInput.classList.add('ring-2', 'ring-green-500', 'ring-opacity-50');
                        setTimeout(() => {
                            bulananInput.classList.remove('ring-2', 'ring-green-500', 'ring-opacity-50');
                        }, 1500);
                    }
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

                // Add visual feedback for changes
                input.addEventListener('input', function() {
                    const currentValue = parseFloat(this.value) || 0;
                    const originalValue = input === mingguanInput ? originalMingguan : originalBulanan;
                    
                    if (currentValue !== originalValue) {
                        this.classList.add('border-blue-500', 'ring-1', 'ring-blue-500');
                    } else {
                        this.classList.remove('border-blue-500', 'ring-1', 'ring-blue-500');
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
                    Mengupdate...
                `;
            });

            // Add thousand separators for display (on focus out)
            function addDisplayFormatting(input) {
                input.addEventListener('blur', function() {
                    const value = parseInt(this.value);
                    if (!isNaN(value) && value > 0) {
                        // Optional: You can add visual formatting here
                        // For now, just ensure it's a clean integer
                        this.value = value;
                    }
                });
            }

            addDisplayFormatting(mingguanInput);
            addDisplayFormatting(bulananInput);

            // Detect unsaved changes
            let hasUnsavedChanges = false;
            const formInputs = form.querySelectorAll('input, select');
            
            formInputs.forEach(input => {
                input.addEventListener('change', function() {
                    hasUnsavedChanges = true;
                });
            });

            // Warn user about unsaved changes
            window.addEventListener('beforeunload', function(e) {
                if (hasUnsavedChanges) {
                    e.preventDefault();
                    e.returnValue = 'Anda memiliki perubahan yang belum disimpan. Yakin ingin meninggalkan halaman ini?';
                }
            });

            // Clear warning when form is submitted
            form.addEventListener('submit', function() {
                hasUnsavedChanges = false;
            });
        });
    </script>
</x-app-layout>