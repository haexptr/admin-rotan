<x-app-layout>
    @section('title', 'Detail Karyawan')

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

        /* Information card styling */
        .info-card {
            transition: all 0.3s ease;
        }

        .info-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
        }

        .dark .info-card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.3);
        }

        /* Reduced motion */
        @media (prefers-reduced-motion: reduce) {
            .animate-fade-in-up,
            .animate-slide-in,
            .animate-float,
            .animate-shimmer {
                animation: none;
            }
        }

        /* Print styles */
        @media print {
            .no-print {
                display: none;
            }
            
            .print-optimize {
                background: white !important;
                color: black !important;
                box-shadow: none !important;
            }
        }
    </style>

    <div class="min-h-screen bg-gray-50 dark:bg-gray-900 transition-colors duration-300">
        <div class="max-w-5xl mx-auto p-6 space-y-8 animate-fade-in-up">
            
            <!-- Sophisticated Header -->
            <div class="flex items-center justify-between">
                <div class="space-y-3">
                    <div class="flex items-center space-x-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-gray-700 to-gray-900 dark:from-gray-200 dark:to-gray-400 rounded-full flex items-center justify-center shadow-lg animate-float">
                            <svg class="w-6 h-6 text-white dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                            </svg>
                        </div>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900 dark:text-white tracking-tight">Detail Karyawan</h1>
                            <p class="text-gray-600 dark:text-gray-300 font-medium">Informasi lengkap profil karyawan</p>
                        </div>
                    </div>
                    <div class="w-24 h-1 bg-gradient-to-r from-gray-600 to-gray-400 dark:from-gray-400 dark:to-gray-200 rounded-full"></div>
                </div>
                
                <div class="flex items-center space-x-4 no-print">
                    <a href="{{ route('karyawans.edit', $karyawan->id_karyawan) }}" 
                       class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-white bg-gray-900 dark:bg-gray-100 dark:text-gray-900 rounded-xl hover:shadow-lg transition-all duration-300 hover-lift">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        Edit Data
                    </a>
                    <a href="{{ route('karyawans.index') }}" 
                       class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-white/80 dark:bg-gray-800/80 glass-card border border-gray-200 dark:border-gray-700 rounded-xl hover:shadow-lg hover:bg-white/90 dark:hover:bg-gray-800/90 transition-all duration-300 hover-lift">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Employee Profile Card -->
            <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl overflow-hidden print-optimize">
                <!-- Profile Header with Gradient -->
                <div class="relative bg-gradient-to-r from-gray-800 via-gray-700 to-gray-800 dark:from-gray-200 dark:via-gray-100 dark:to-gray-200 px-8 py-12">
                    <div class="absolute inset-0 animate-shimmer opacity-30"></div>
                    <div class="relative flex items-center space-x-6">
                        <div class="h-20 w-20 rounded-full bg-white/20 dark:bg-gray-900/20 flex items-center justify-center shadow-2xl animate-float">
                            <span class="text-3xl font-bold text-white dark:text-gray-900 tracking-wide">
                                {{ strtoupper(substr($karyawan->nama, 0, 2)) }}
                            </span>
                        </div>
                        <div class="space-y-2">
                            <h2 class="text-3xl font-bold text-white dark:text-gray-900 tracking-tight">{{ $karyawan->nama }}</h2>
                            <div class="flex items-center space-x-2">
                                <div class="p-1 bg-white/20 dark:bg-gray-900/20 rounded-full">
                                    <svg class="w-4 h-4 text-white dark:text-gray-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H5a2 2 0 00-2 2v9a2 2 0 002 2h14a2 2 0 002-2V8a2 2 0 00-2-2h-5m-4 0V5a2 2 0 114 0v1m-4 0a2 2 0 104 0m-5 8a2 2 0 100-4 2 2 0 000 4zm0 0c1.306 0 2.417.835 2.83 2M9 14a3.001 3.001 0 00-2.83 2M15 11h3m-3 4h2"></path>
                                    </svg>
                                </div>
                                <p class="text-white/90 dark:text-gray-900/90 font-semibold">ID: {{ $karyawan->id_karyawan }}</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Content Grid -->
                <div class="p-8">
                    <div class="grid grid-cols-1 xl:grid-cols-2 gap-8">
                        
                        <!-- Personal Information Section -->
                        <div class="space-y-6 animate-slide-in">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Personal</h3>
                            </div>
                            
                            <div class="space-y-4">
                                <!-- Nama -->
                                <div class="info-card p-5 bg-gray-50/80 dark:bg-gray-700/50 glass-card rounded-xl border border-gray-200/50 dark:border-gray-600/50">
                                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">
                                        Nama Lengkap
                                    </label>
                                    <p class="text-lg font-bold text-gray-900 dark:text-white tracking-wide">{{ $karyawan->nama }}</p>
                                </div>

                                <!-- No Telepon -->
                                <div class="info-card p-5 bg-gray-50/80 dark:bg-gray-700/50 glass-card rounded-xl border border-gray-200/50 dark:border-gray-600/50">
                                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">
                                        Nomor Telepon
                                    </label>
                                    <div class="flex items-center space-x-3">
                                        <div class="p-1 bg-gray-200 dark:bg-gray-600 rounded-lg">
                                            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-lg font-bold text-gray-900 dark:text-white">{{ $karyawan->no_telp }}</p>
                                    </div>
                                </div>

                                <!-- Alamat -->
                                <div class="info-card p-5 bg-gray-50/80 dark:bg-gray-700/50 glass-card rounded-xl border border-gray-200/50 dark:border-gray-600/50">
                                    <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest mb-2">
                                        Alamat
                                    </label>
                                    <div class="flex items-start space-x-3">
                                        <div class="p-1 bg-gray-200 dark:bg-gray-600 rounded-lg flex-shrink-0 mt-1">
                                            <svg class="w-4 h-4 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                            </svg>
                                        </div>
                                        <p class="text-lg text-gray-900 dark:text-white leading-relaxed font-medium">{{ $karyawan->alamat }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Weight Information Section -->
                        <div class="space-y-6 animate-slide-in">
                            <div class="flex items-center space-x-3 mb-6">
                                <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                                    <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                                    </svg>
                                </div>
                                <h3 class="text-xl font-bold text-gray-900 dark:text-white">Informasi Timbangan</h3>
                            </div>

                            <div class="space-y-4">
                                <!-- Timbangan In -->
                                <div class="info-card p-6 bg-gray-50/80 dark:bg-gray-700/50 glass-card rounded-xl border border-gray-200/50 dark:border-gray-600/50">
                                    <div class="flex items-center justify-between">
                                        <div class="space-y-2">
                                            <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                                                Timbangan Masuk
                                            </label>
                                            <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                                {{ $karyawan->memuat_timbangan_in ? number_format($karyawan->memuat_timbangan_in, 2, ',', '.') : '0,00' }}
                                                <span class="text-lg font-medium text-gray-600 dark:text-gray-400">Kg</span>
                                            </p>
                                        </div>
                                        <div class="p-4 bg-gray-200 dark:bg-gray-600 rounded-xl animate-float">
                                            <svg class="w-8 h-8 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Timbangan Out -->
                                <div class="info-card p-6 bg-gray-50/80 dark:bg-gray-700/50 glass-card rounded-xl border border-gray-200/50 dark:border-gray-600/50">
                                    <div class="flex items-center justify-between">
                                        <div class="space-y-2">
                                            <label class="block text-xs font-bold text-gray-500 dark:text-gray-400 uppercase tracking-widest">
                                                Timbangan Keluar
                                            </label>
                                            <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                                {{ $karyawan->memuat_timbangan_out ? number_format($karyawan->memuat_timbangan_out, 2, ',', '.') : '0,00' }}
                                                <span class="text-lg font-medium text-gray-600 dark:text-gray-400">Kg</span>
                                            </p>
                                        </div>
                                        <div class="p-4 bg-gray-200 dark:bg-gray-600 rounded-xl animate-float">
                                            <svg class="w-8 h-8 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                            </svg>
                                        </div>
                                    </div>
                                </div>

                                <!-- Net Weight -->
                                @php
                                    $netWeight = ($karyawan->memuat_timbangan_in ?? 0) - ($karyawan->memuat_timbangan_out ?? 0);
                                @endphp
                                <div class="info-card p-6 bg-gray-100/80 dark:bg-gray-600/50 glass-card rounded-xl border-2 border-gray-300/50 dark:border-gray-500/50">
                                    <div class="flex items-center justify-between">
                                        <div class="space-y-2">
                                            <label class="block text-xs font-bold text-gray-600 dark:text-gray-300 uppercase tracking-widest">
                                                Selisih Berat
                                            </label>
                                            <p class="text-3xl font-bold text-gray-900 dark:text-white">
                                                {{ number_format($netWeight, 2, ',', '.') }}
                                                <span class="text-lg font-medium text-gray-600 dark:text-gray-400">Kg</span>
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
                        </div>
                    </div>
                </div>
            </div>

            <!-- Quick Actions Card -->
            <div class="bg-white/80 dark:bg-gray-800/80 glass-card rounded-xl border border-gray-200/50 dark:border-gray-700/50 shadow-xl p-6 no-print">
                <div class="flex items-center space-x-3 mb-6">
                    <div class="p-2 bg-gray-100 dark:bg-gray-700 rounded-lg">
                        <svg class="w-5 h-5 text-gray-600 dark:text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"></path>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-900 dark:text-white">Aksi Cepat</h3>
                </div>
                
                <div class="flex flex-wrap gap-4">
                    <a href="{{ route('karyawans.edit', $karyawan->id_karyawan) }}" 
                       class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-gray-100/80 dark:bg-gray-700/80 glass-card border border-gray-200 dark:border-gray-600 rounded-xl hover:shadow-lg hover:bg-gray-200/90 dark:hover:bg-gray-600/90 transition-all duration-300 hover-lift">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                        </svg>
                        Edit Data
                    </a>
                    
                    <button onclick="window.print()" 
                            class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-gray-100/80 dark:bg-gray-700/80 glass-card border border-gray-200 dark:border-gray-600 rounded-xl hover:shadow-lg hover:bg-gray-200/90 dark:hover:bg-gray-600/90 transition-all duration-300 hover-lift">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"></path>
                        </svg>
                        Print Profil
                    </button>
                    
                    <a href="{{ route('karyawans.index') }}" 
                       class="btn-sophisticated inline-flex items-center px-6 py-3 text-sm font-semibold text-gray-700 dark:text-gray-300 bg-gray-100/80 dark:bg-gray-700/80 glass-card border border-gray-200 dark:border-gray-600 rounded-xl hover:shadow-lg hover:bg-gray-200/90 dark:hover:bg-gray-600/90 transition-all duration-300 hover-lift">
                        <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 10h16M4 14h16M4 18h16"></path>
                        </svg>
                        Kembali ke Daftar
                    </a>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
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

            // Observe all info cards
            const infoCards = document.querySelectorAll('.info-card');
            infoCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 100}ms`;
                observer.observe(card);
            });

            // Enhanced print function
            const printButton = document.querySelector('button[onclick="window.print()"]');
            if (printButton) {
                printButton.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    // Add loading state
                    const originalContent = this.innerHTML;
                    this.innerHTML = `
                        <svg class="w-5 h-5 mr-3 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="m4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        Menyiapkan...
                    `;
                    
                    setTimeout(() => {
                        window.print();
                        this.innerHTML = originalContent;
                    }, 1000);
                });
            }

            console.log('🎨 Sophisticated Karyawan Show Loaded!');
        });
    </script>
</x-app-layout>