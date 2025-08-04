<x-app-layout>
    @section('title', 'Edit Karyawan')

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

        /* Weight difference styling */
        .weight-positive {
            color: #059669;
        }

        .weight-negative {
            color: #DC2626;
        }

        .weight-neutral {
            color: #6B7280;
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in,
            .animate-float,
            .animate-shimmer,
            .animate-pulse {
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Edit Karyawan</h1>
                            <p class="text-gray-600 dark:text-gray-300 font-medium">Perbarui data karyawan: <span class="font-bold">{{ $karyawan->nama }}</span></p>
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

            <!-- Current Data Preview -->
            <div class="bg-gray-100/80 dark:bg-gray-800/80 glass-card border border-gray-200/50 dark:border-gray-700/50 rounded-xl p-6 animate-slide-in">
                <div class="flex items-center space-x-4">
                    <div class="h-12 w-12 rounded-full bg-gradient-to-br from-gray-600 to-gray-800 dark:from-gray-300 dark:to-gray-500 flex items-center justify-center shadow-lg animate-float">
                        <span class="text-sm font-bold text-white dark:text-gray-900 tracking-wide">
                            {{ strtoupper(substr($karyawan->nama, 0, 2)) }}
                        </span>
                    </div>
                    <div class="space-y-1">
                        <p class="text-lg font-bold text-gray-900 dark:text-white tracking-wide">{{ $karyawan->nama }}</p>
                        <div class="flex items-center space-x-2">
                            <div class="w-2 h-2 bg-gray-400 dark:bg-gray-500 rounded-full animate-pulse"></div>
                            <p class="text-sm text-gray-600 dark:text-gray-300 font-medium">ID: {{ $karyawan->id_karyawan }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Sophisticated Form Card -->
            <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden">
                <div class="p-8">
                    <form action="{{ route('karyawans.update', $karyawan->id_karyawan) }}" method="POST" class="space-y-8">
                        @csrf 
                        @method('PUT')

                        <!-- Personal Information Section -->
                        <div class="space-y-6 animate-slide-in">
                            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200/50 dark:border-gray-700/50">
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
                                    Nama Lengkap
                                    <span class="text-red-500 ml-1">*</span>
                                </label>
                                <input type="text" 
                                       name="nama" 
                                       id="nama" 
                                       value="{{ old('nama', $karyawan->nama) }}"
                                       placeholder="Masukkan nama lengkap karyawan"
                                       class="form-input w-full px-4 py-3 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium"
                                       required>
                                @error('nama')
                                    <p class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
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
                                          required>{{ old('alamat', $karyawan->alamat) }}</textarea>
                                @error('alamat')
                                    <p class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
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
                                       value="{{ old('no_telp', $karyawan->no_telp) }}"
                                       placeholder="Contoh: 08123456789"
                                       class="form-input w-full px-4 py-3 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium"
                                       required>
                                @error('no_telp')
                                    <p class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <!-- Weight Information Section -->
                        <div class="space-y-6 animate-slide-in">
                            <div class="flex items-center space-x-3 pb-4 border-b border-gray-200/50 dark:border-gray-700/50">
                                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Timbangan</h3>
                            </div>

                            <!-- Current vs New Comparison -->
                            <div class="bg-gray-100/80 dark:bg-gray-700/50 glass-card rounded-xl p-6 mb-6">
                                <h4 class="text-sm font-bold text-gray-700 dark:text-gray-300 mb-4 flex items-center">
                                    <div class="w-2 h-2 bg-gray-500 rounded-full mr-2 animate-pulse"></div>
                                    Data Timbangan Saat Ini:
                                </h4>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                    <div class="space-y-2">
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">Timbangan Masuk:</span>
                                        <div class="text-lg font-bold text-gray-900 dark:text-white">
                                            {{ $karyawan->memuat_timbangan_in ? number_format($karyawan->memuat_timbangan_in, 2, ',', '.') : '0,00' }} 
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Kg</span>
                                        </div>
                                    </div>
                                    <div class="space-y-2">
                                        <span class="text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">Timbangan Keluar:</span>
                                        <div class="text-lg font-bold text-gray-900 dark:text-white">
                                            {{ $karyawan->memuat_timbangan_out ? number_format($karyawan->memuat_timbangan_out, 2, ',', '.') : '0,00' }} 
                                            <span class="text-sm font-medium text-gray-600 dark:text-gray-400">Kg</span>
                                        </div>
                                    </div>
                                </div>
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
                                               value="{{ old('memuat_timbangan_in', $karyawan->memuat_timbangan_in) }}"
                                               placeholder="0.00"
                                               class="form-input w-full px-4 py-3 pr-12 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium">
                                        <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm font-bold text-gray-500 dark:text-gray-400">Kg</span>
                                    </div>
                                    @error('memuat_timbangan_in')
                                        <p class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
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
                                               value="{{ old('memuat_timbangan_out', $karyawan->memuat_timbangan_out) }}"
                                               placeholder="0.00"
                                               class="form-input w-full px-4 py-3 pr-12 text-sm border border-gray-300 dark:border-gray-600 rounded-xl bg-white/70 dark:bg-gray-700/70 glass-card text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:border-transparent font-medium">
                                        <span class="absolute right-4 top-1/2 transform -translate-y-1/2 text-sm font-bold text-gray-500 dark:text-gray-400">Kg</span>
                                    </div>
                                    @error('memuat_timbangan_out')
                                        <p class="text-xs text-red-600 dark:text-red-400 font-medium">{{ $message }}</p>
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
                                        <p class="text-2xl font-bold" id="weightDifference">
                                            0,00 <span class="text-lg font-medium text-gray-600 dark:text-gray-400">Kg</span>
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
                                Batal
                            </a>
                            <a href="{{ route('karyawans.show', $karyawan->id_karyawan) }}" 
                               class="w-full sm:w-auto btn-sophisticated inline-flex items-center justify-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-gray-100/80 dark:bg-gray-600/80 glass-card border border-gray-200 dark:border-gray-500 rounded-xl hover:bg-gray-200/90 dark:hover:bg-gray-500/90 transition-all duration-300">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Preview
                            </a>
                            <button type="submit" 
                                    class="w-full sm:w-auto btn-sophisticated inline-flex items-center justify-center px-8 py-3 text-sm font-semibold text-white bg-gray-900 dark:bg-gray-100 dark:text-gray-900 rounded-xl hover:shadow-lg transition-all duration-300 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                </svg>
                                Update Karyawan
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Enhanced JavaScript for Live Weight Calculation -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const weightInInput = document.getElementById('memuat_timbangan_in');
            const weightOutInput = document.getElementById('memuat_timbangan_out');
            const weightDifferenceDisplay = document.getElementById('weightDifference');

            function calculateWeightDifference() {
                const weightIn = parseFloat(weightInInput.value) || 0;
                const weightOut = parseFloat(weightOutInput.value) || 0;
                const difference = weightIn - weightOut;
                
                // Format the difference
                const formattedDifference = difference.toLocaleString('id-ID', { 
                    minimumFractionDigits: 2, 
                    maximumFractionDigits: 2 
                });
                
                weightDifferenceDisplay.innerHTML = 
                    formattedDifference + 
                    ' <span class="text-lg font-medium text-gray-600 dark:text-gray-400">Kg</span>';
                
                // Change color based on difference with sophisticated styling
                if (difference > 0) {
                    weightDifferenceDisplay.className = 'text-2xl font-bold weight-positive';
                } else if (difference < 0) {
                    weightDifferenceDisplay.className = 'text-2xl font-bold weight-negative';
                } else {
                    weightDifferenceDisplay.className = 'text-2xl font-bold weight-neutral';
                }
            }

            // Calculate on page load
            calculateWeightDifference();

            // Calculate on input change with debouncing
            let calculationTimeout;
            function debouncedCalculation() {
                clearTimeout(calculationTimeout);
                calculationTimeout = setTimeout(calculateWeightDifference, 300);
            }

            weightInInput.addEventListener('input', debouncedCalculation);
            weightOutInput.addEventListener('input', debouncedCalculation);

            // Enhanced form validation
            const form = document.querySelector('form');
            const submitButton = form.querySelector('button[type="submit"]');
            
            form.addEventListener('submit', function(e) {
                // Add loading state to submit button
                const originalContent = submitButton.innerHTML;
                submitButton.innerHTML = `
                    <svg class="w-4 h-4 mr-2 animate-spin" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                        <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                    </svg>
                    Mengupdate...
                `;
                submitButton.disabled = true;
                
                // If validation fails, restore button
                setTimeout(() => {
                    if (submitButton.disabled) {
                        submitButton.innerHTML = originalContent;
                        submitButton.disabled = false;
                    }
                }, 5000);
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
            const formSections = document.querySelectorAll('.animate-slide-in');
            formSections.forEach((section, index) => {
                section.style.animationDelay = `${index * 200}ms`;
                observer.observe(section);
            });

            console.log('🎨 Sophisticated Karyawan Edit Loaded!');
        });
    </script>
</x-app-layout>