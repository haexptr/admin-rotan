<x-app-layout>
    @section('title', 'Tambah Karyawan')

    <style>
        /* ========================================
           SOPHISTICATED ANIMATIONS & EFFECTS
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

        @keyframes shimmer {
            0% { background-position: -200% center; }
            100% { background-position: 200% center; }
        }

        @keyframes pulse {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }

        @keyframes successPulse {
            0%, 100% { transform: scale(1); }
            50% { transform: scale(1.05); }
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

        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            background-size: 200% 100%;
            animation: shimmer 2s infinite;
        }

        .animate-pulse {
            animation: pulse 2s cubic-bezier(0.4, 0, 0.6, 1) infinite;
        }

        .animate-success-pulse {
            animation: successPulse 0.6s ease-in-out;
        }

        /* Glassmorphism effect */
        .glass-card {
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
        }

        /* Professional hover effects */
        .hover-lift {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }

        .hover-lift:hover {
            transform: translateY(-2px);
        }

        /* Font smoothing */
        * {
            -webkit-font-smoothing: antialiased;
            -moz-osx-font-smoothing: grayscale;
        }

        /* Enhanced form styling */
        .form-input {
            transition: all 0.3s ease;
        }

        .form-input:focus {
            transform: scale(1.01);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .dark .form-input:focus {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* Button enhancements */
        .btn-sophisticated {
            position: relative;
            overflow: hidden;
            transition: all 0.3s ease;
        }

        .btn-sophisticated::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255,255,255,0.1), transparent);
            transition: left 0.5s ease;
        }

        .btn-sophisticated:hover::before {
            left: 100%;
        }

        /* Form step indicator */
        .step-indicator {
            transition: all 0.3s ease;
        }

        .step-active {
            background: linear-gradient(135deg, #374151, #1f2937);
            color: white;
        }

        .dark .step-active {
            background: linear-gradient(135deg, #f3f4f6, #e5e7eb);
            color: #1f2937;
        }

        /* Success message styling */
        .success-message {
            animation: fadeInUp 0.6s ease-out, successPulse 0.6s ease-in-out 0.6s;
        }

        /* Progress bar */
        .progress-bar {
            transition: width 0.5s ease;
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in,
            .animate-float,
            .animate-shimmer,
            .animate-pulse,
            .animate-success-pulse {
                animation: none;
            }
        }
    </style>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-4xl mx-auto p-6 space-y-8 animate-fade-in-up">
            
            <!-- Sophisticated Header -->
            <div class="flex items-center justify-between">
                <div class="space-y-3">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-200 dark:to-gray-400 rounded-full flex items-center justify-center shadow-lg animate-float">
                            <svg class="w-6 h-6 text-white dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Tambah Karyawan</h1>
                            <p class="text-gray-600 dark:text-gray-300 font-medium">Registrasi karyawan baru dalam sistem</p>
                        </div>
                    </div>
                    <div class="w-24 h-1 bg-gradient-to-r from-gray-600 to-gray-400 dark:from-gray-400 dark:to-gray-200 rounded-full"></div>
                </div>
                
                <a href="{{ route('karyawans.index') }}" 
                   class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-white/80 dark:bg-gray-800/80 glass-card border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-300 hover-lift">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Progress Indicator -->
            <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 p-6">
                <div class="flex items-center justify-between mb-4">
                    <h3 class="text-lg font-bold text-gray-900 dark:text-white">Progress Registrasi</h3>
                    <span class="text-sm font-medium text-gray-600 dark:text-gray-300" id="progressText">0% Selesai</span>
                </div>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-2">
                    <div class="progress-bar bg-gradient-to-r from-gray-600 to-gray-800 dark:from-gray-300 dark:to-gray-500 h-2 rounded-full" style="width: 0%" id="progressBar"></div>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('success'))
                <div class="success-message bg-emerald-50/80 dark:bg-emerald-900/20 glass-card border border-emerald-200 dark:border-emerald-800 rounded-xl p-6">
                    <div class="flex items-center space-x-4">
                        <div class="flex-shrink-0">
                            <div class="w-12 h-12 bg-emerald-100 dark:bg-emerald-800 rounded-full flex items-center justify-center animate-float">
                                <svg class="w-6 h-6 text-emerald-600 dark:text-emerald-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                        <div>
                            <h4 class="text-lg font-bold text-emerald-800 dark:text-emerald-200">Berhasil!</h4>
                            <p class="text-emerald-700 dark:text-emerald-300 font-medium">{{ session('success') }}</p>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Sophisticated Form Card -->
            <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('karyawans.store') }}" method="POST" class="space-y-8" id="employeeForm">
                        @csrf

                        <!-- Personal Information Section -->
                        <div class="space-y-6 animate-slide-in form-section" data-section="1">
                            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200/50 dark:border-gray-700/50">
                                <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold border-2 border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-300">
                                    1
                                </div>
                                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Personal</h3>
                            </div>

                            <!-- Nama -->
                            <div class="space-y-3">
                                <label for="nama" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                                    Nama Lengkap Karyawan
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" 
                                       name="nama" 
                                       id="nama" 
                                       value="{{ old('nama') }}"
                                       placeholder="Masukkan nama lengkap karyawan"
                                       class="form-input w-full px-4 py-3 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium"
                                       required>
                                @error('nama')
                                    <p class="text-xs text-red-600 dark:text-red-400 font-medium flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- Alamat -->
                            <div class="space-y-3">
                                <label for="alamat" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                                    Alamat Lengkap
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <textarea name="alamat" 
                                          id="alamat" 
                                          rows="4"
                                          placeholder="Masukkan alamat lengkap karyawan"
                                          class="form-input w-full px-4 py-3 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent resize-none font-medium"
                                          required>{{ old('alamat') }}</textarea>
                                @error('alamat')
                                    <p class="text-xs text-red-600 dark:text-red-400 font-medium flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>

                            <!-- No Telepon -->
                            <div class="space-y-3">
                                <label for="no_telp" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                                    Nomor Telepon
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="tel" 
                                       name="no_telp" 
                                       id="no_telp" 
                                       value="{{ old('no_telp') }}"
                                       placeholder="Contoh: 08123456789"
                                       class="form-input w-full px-4 py-3 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium"
                                       required>
                                @error('no_telp')
                                    <p class="text-xs text-red-600 dark:text-red-400 font-medium flex items-center">
                                        <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>

                        <!-- Weight Information Section -->
                        <div class="space-y-6 animate-slide-in form-section" data-section="2">
                            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200/50 dark:border-gray-700/50">
                                <div class="step-indicator w-8 h-8 rounded-full flex items-center justify-center text-sm font-bold border-2 border-gray-300 dark:border-gray-600 text-gray-600 dark:text-gray-300">
                                    2
                                </div>
                                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Timbangan</h3>
                            </div>

                            <div class="bg-gray-100/80 dark:bg-gray-700/50 glass-card rounded-xl p-6 mb-6">
                                <div class="flex items-center space-x-3 mb-3">
                                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-pulse"></div>
                                    <h4 class="text-sm font-bold text-gray-700 dark:text-gray-300">Informasi Tambahan</h4>
                                </div>
                                <p class="text-sm text-gray-600 dark:text-gray-400 leading-relaxed">
                                    Data timbangan dapat diisi sekarang atau diperbarui kemudian. Jika belum ada data, biarkan kosong atau isi dengan 0.
                                </p>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                <!-- Timbangan In -->
                                <div class="space-y-3">
                                    <label for="memuat_timbangan_in" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                                        Timbangan Masuk (Kg)
                                    </label>
                                    <div class="relative">
                                        <input type="number" 
                                               step="0.01"
                                               min="0"
                                               name="memuat_timbangan_in" 
                                               id="memuat_timbangan_in" 
                                               value="{{ old('memuat_timbangan_in', '0') }}"
                                               placeholder="0.00"
                                               class="form-input w-full px-4 py-3 pr-12 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium">
                                        <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm font-bold text-gray-500 dark:text-gray-400">Kg</span>
                                    </div>
                                    @error('memuat_timbangan_in')
                                        <p class="text-xs text-red-600 dark:text-red-400 font-medium flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Timbangan Out -->
                                <div class="space-y-3">
                                    <label for="memuat_timbangan_out" class="block text-sm font-bold text-gray-700 dark:text-gray-300">
                                        Timbangan Keluar (Kg)
                                    </label>
                                    <div class="relative">
                                        <input type="number" 
                                               step="0.01"
                                               min="0"
                                               name="memuat_timbangan_out" 
                                               id="memuat_timbangan_out" 
                                               value="{{ old('memuat_timbangan_out', '0') }}"
                                               placeholder="0.00"
                                               class="form-input w-full px-4 py-3 pr-12 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium">
                                        <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm font-bold text-gray-500 dark:text-gray-400">Kg</span>
                                    </div>
                                    @error('memuat_timbangan_out')
                                        <p class="text-xs text-red-600 dark:text-red-400 font-medium flex items-center">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>
                            </div>

                            <!-- Live Weight Difference Calculator -->
                            <div class="bg-gray-100/80 dark:bg-gray-600/50 glass-card rounded-xl p-6 border-2 border-gray-300/50 dark:border-gray-500/50">
                                <div class="flex items-center justify-between">
                                    <div class="space-y-2">
                                        <label class="block text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-widest">
                                            Selisih Berat (Live Preview)
                                        </label>
                                        <p class="text-2xl font-bold text-gray-600 dark:text-gray-300" id="weightDifference">
                                            0,00 <span class="text-lg font-medium text-gray-500 dark:text-gray-400">Kg</span>
                                        </p>
                                    </div>
                                    <div class="p-4 bg-gray-300 dark:bg-gray-500 rounded-xl animate-float">
                                        <svg class="w-8 h-8 text-gray-700 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex flex-col sm:flex-row items-center justify-end space-y-3 sm:space-y-0 sm:space-x-4 pt-8 border-t border-gray-200/50 dark:border-gray-700/50">
                            <a href="{{ route('karyawans.index') }}" 
                               class="w-full sm:w-auto btn-sophisticated inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-white dark:bg-gray-700 border border-gray-300 dark:border-gray-600 rounded-xl hover:bg-gray-50 dark:hover:bg-gray-600 transition-all duration-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                </svg>
                                Batal
                            </a>
                            <button type="submit" 
                                    class="w-full sm:w-auto btn-sophisticated inline-flex items-center justify-center px-8 py-3 text-sm font-semibold text-white bg-gray-900 dark:bg-gray-100 dark:text-gray-900 rounded-xl hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                </svg>
                                Simpan Karyawan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Form elements
            const form = document.getElementById('employeeForm');
            const weightInInput = document.getElementById('memuat_timbangan_in');
            const weightOutInput = document.getElementById('memuat_timbangan_out');
            const weightDifferenceDisplay = document.getElementById('weightDifference');
            const progressBar = document.getElementById('progressBar');
            const progressText = document.getElementById('progressText');
            const submitButton = form.querySelector('button[type="submit"]');

            // Form fields for progress calculation
            const requiredFields = ['nama', 'alamat', 'no_telp'];
            const allFields = [...requiredFields, 'memuat_timbangan_in', 'memuat_timbangan_out'];

            // Weight difference calculation
            function calculateWeightDifference() {
                const weightIn = parseFloat(weightInInput.value) || 0;
                const weightOut = parseFloat(weightOutInput.value) || 0;
                const difference = weightIn - weightOut;
                
                const formattedDifference = difference.toLocaleString('id-ID', { 
                    minimumFractionDigits: 2, 
                    maximumFractionDigits: 2 
                });
                
                weightDifferenceDisplay.innerHTML = 
                    formattedDifference + 
                    ' <span class="text-lg font-medium text-gray-500 dark:text-gray-400">Kg</span>';
                
                // Color based on difference
                if (difference > 0) {
                    weightDifferenceDisplay.className = 'text-2xl font-bold text-emerald-600 dark:text-emerald-400';
                } else if (difference < 0) {
                    weightDifferenceDisplay.className = 'text-2xl font-bold text-red-600 dark:text-red-400';
                } else {
                    weightDifferenceDisplay.className = 'text-2xl font-bold text-gray-600 dark:text-gray-300';
                }
            }

            // Progress calculation
            function updateProgress() {
                let filledFields = 0;
                let totalProgress = 0;

                allFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (field && field.value.trim() !== '') {
                        filledFields++;
                        // Required fields get more weight
                        if (requiredFields.includes(fieldId)) {
                            totalProgress += 30; // 30% each for required fields (90% total)
                        } else {
                            totalProgress += 5; // 5% each for optional fields (10% total)
                        }
                    }
                });

                // Update progress bar
                const progressPercentage = Math.min(totalProgress, 100);
                progressBar.style.width = progressPercentage + '%';
                progressText.textContent = Math.round(progressPercentage) + '% Selesai';

                // Update step indicators
                updateStepIndicators(progressPercentage);
            }

            // Step indicators update
            function updateStepIndicators(progress) {
                const stepIndicators = document.querySelectorAll('.step-indicator');
                
                stepIndicators.forEach((indicator, index) => {
                    if (progress >= (index + 1) * 50) {
                        indicator.classList.add('step-active');
                    } else {
                        indicator.classList.remove('step-active');
                    }
                });
            }

            // Event listeners for real-time updates
            allFields.forEach(fieldId => {
                const field = document.getElementById(fieldId);
                if (field) {
                    field.addEventListener('input', () => {
                        updateProgress();
                        if (fieldId.includes('timbangan')) {
                            calculateWeightDifference();
                        }
                    });
                }
            });

            // Form submission enhancement
            form.addEventListener('submit', function(e) {
                // Add loading state
                const originalContent = submitButton.innerHTML;
                submitButton.innerHTML = `
                    <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Menyimpan...
                `;
                submitButton.disabled = true;
                
                // Validate required fields
                let hasError = false;
                requiredFields.forEach(fieldId => {
                    const field = document.getElementById(fieldId);
                    if (!field.value.trim()) {
                        hasError = true;
                        field.classList.add('border-red-500');
                        field.focus();
                    } else {
                        field.classList.remove('border-red-500');
                    }
                });

                if (hasError) {
                    e.preventDefault();
                    submitButton.innerHTML = originalContent;
                    submitButton.disabled = false;
                    
                    // Show error message
                    const errorDiv = document.createElement('div');
                    errorDiv.className = 'fixed top-4 right-4 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 text-red-700 dark:text-red-200 px-6 py-4 rounded-xl shadow-lg z-50';
                    errorDiv.innerHTML = `
                        <div class="flex items-center space-x-3">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                            <span class="font-medium">Mohon lengkapi semua field yang wajib diisi</span>
                        </div>
                    `;
                    document.body.appendChild(errorDiv);
                    
                    setTimeout(() => {
                        errorDiv.remove();
                    }, 5000);
                }
            });

            // Sophisticated scroll animations
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('animate-slide-in');
                    }
                });
            }, observerOptions);

            // Observe form sections
            const formSections = document.querySelectorAll('.form-section');
            formSections.forEach((section, index) => {
                section.style.animationDelay = `${index * 200}ms`;
                observer.observe(section);
            });

            // Initialize
            calculateWeightDifference();
            updateProgress();

            console.log('🎨 Sophisticated Karyawan Create Loaded!');
        });
    </script>
</x-app-layout>