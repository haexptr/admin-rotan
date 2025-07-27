<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Register - {{ config('app.name', 'Admin Rotan') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans min-h-screen bg-gradient-to-br from-blue-50 via-indigo-50 to-purple-50 flex items-center justify-center p-4 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 bg-grid-pattern opacity-5"></div>
    
    <!-- Floating Background Elements -->
    <div class="absolute -top-10 -left-10 w-20 h-20 bg-gradient-to-r from-blue-400 to-purple-500 rounded-full blur-xl opacity-20 animate-pulse"></div>
    <div class="absolute -bottom-10 -right-10 w-32 h-32 bg-gradient-to-r from-purple-400 to-pink-500 rounded-full blur-xl opacity-20 animate-pulse" style="animation-delay: 1000ms;"></div>
    
    <!-- Main Container -->
    <div class="relative w-full max-w-md">
        <!-- Main Card -->
        <div class="bg-white/80 backdrop-blur-lg rounded-2xl shadow-2xl border border-white/20 p-8 transform transition-all duration-300 hover:scale-[1.02]">
            <!-- Header Section -->
            <div class="text-center mb-8">
                <!-- Animated Logo -->
                <div class="relative mx-auto w-16 h-16 mb-4">
                    <div class="absolute inset-0 bg-gradient-to-r from-green-500 via-emerald-500 to-teal-500 rounded-2xl animate-spin" style="animation-duration: 8s;"></div>
                    <div class="relative bg-white rounded-2xl flex items-center justify-center w-full h-full">
                        <span class="text-2xl">👤</span>
                    </div>
                </div>
                
                <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent mb-2">
                    Daftar Akun
                </h1>
                <p class="text-gray-600 text-sm">Admin Rotan - Bergabunglah dengan sistem kami</p>
            </div>

            <!-- Form -->
            <form id="registerForm" method="POST" action="{{ route('register') }}" class="space-y-6">
                @csrf

                <!-- Name -->
                <div class="space-y-2">
                    <label for="name" class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg text-white text-sm">👤</span>
                        Name
                    </label>
                    <div class="relative">
                        <input id="name" 
                               type="text" 
                               name="name" 
                               value="{{ old('name') }}" 
                               required 
                               autofocus
                               autocomplete="name"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 hover:bg-white/70"
                               placeholder="masukkan nama lengkap">
                    </div>
                    @error('name')
                        <div class="flex items-center mt-2 text-red-600 text-xs gap-2 bg-red-50 border border-red-200 rounded-lg p-2">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Email Address -->
                <div class="space-y-2">
                    <label for="email" class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-green-500 to-emerald-600 rounded-lg text-white text-sm">📧</span>
                        Email
                    </label>
                    <div class="relative">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required
                               autocomplete="username"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 hover:bg-white/70"
                               placeholder="contoh@email.com">
                    </div>
                    @error('email')
                        <div class="flex items-center mt-2 text-red-600 text-xs gap-2 bg-red-50 border border-red-200 rounded-lg p-2">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Password -->
                <div class="space-y-2">
                    <label for="password" class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-orange-500 to-red-600 rounded-lg text-white text-sm">🔒</span>
                        Password
                    </label>
                    <div class="relative">
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required
                               autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 hover:bg-white/70"
                               placeholder="minimal 8 karakter">
                    </div>
                    @error('password')
                        <div class="flex items-center mt-2 text-red-600 text-xs gap-2 bg-red-50 border border-red-200 rounded-lg p-2">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Confirm Password -->
                <div class="space-y-2">
                    <label for="password_confirmation" class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-purple-500 to-pink-600 rounded-lg text-white text-sm">🔐</span>
                        Confirm Password
                    </label>
                    <div class="relative">
                        <input id="password_confirmation" 
                               type="password" 
                               name="password_confirmation" 
                               required
                               autocomplete="new-password"
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 hover:bg-white/70"
                               placeholder="konfirmasi password">
                    </div>
                    @error('password_confirmation')
                        <div class="flex items-center mt-2 text-red-600 text-xs gap-2 bg-red-50 border border-red-200 rounded-lg p-2">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="flex flex-col items-center gap-4 mt-6">
                    <!-- Register Button -->
                    <button type="submit" 
                            id="submitBtn"
                            class="w-full relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transform transition-all duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500/50 group flex items-center justify-center gap-2">
                        <span id="btnIcon">🚀</span>
                        <span id="btnText">Daftar Sekarang</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    </button>

                    <!-- Already registered link -->
                    <a href="{{ route('login') }}" 
                       class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors hover:underline flex items-center justify-center gap-2">
                        <span>←</span>
                        <span>Sudah punya akun? Masuk disini</span>
                    </a>
                </div>
            </form>
        </div>

        <!-- Footer -->
        <div class="text-center mt-8">
            <p class="text-xs text-gray-500">
                © 2025 Admin Rotan. Semua hak dilindungi undang-undang.
            </p>
        </div>
    </div>

    <style>
        .bg-grid-pattern {
            background-image: radial-gradient(circle, #e5e7eb 1px, transparent 1px);
            background-size: 20px 20px;
        }

        @keyframes spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        .animate-spin {
            animation: spin 8s linear infinite;
        }

        /* Loading state */
        .loading #btnIcon {
            animation: spin 1s linear infinite;
        }

        .loading #submitBtn {
            background: linear-gradient(135deg, #94a3b8 0%, #64748b 100%);
            cursor: not-allowed;
            transform: none;
        }

        /* Success state */
        .success #submitBtn {
            background: linear-gradient(135deg, #10b981 0%, #059669 100%);
        }

        .success #btnIcon {
            animation: none;
        }

        /* Password match indicator */
        .password-match {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }

        .password-mismatch {
            border-color: #ef4444 !important;
            box-shadow: 0 0 0 3px rgba(239, 68, 68, 0.1) !important;
        }

        /* Valid input state */
        .input-valid {
            border-color: #10b981 !important;
            box-shadow: 0 0 0 3px rgba(16, 185, 129, 0.1) !important;
        }
    </style>

    <script>
        // Form handling
        document.getElementById('registerForm').addEventListener('submit', function(e) {
            // Uncomment untuk demo mode (prevent actual submission)
            // e.preventDefault();
            
            const form = this;
            const submitBtn = document.getElementById('submitBtn');
            const btnIcon = document.getElementById('btnIcon');
            const btnText = document.getElementById('btnText');
            
            // Show loading state
            form.classList.add('loading');
            submitBtn.disabled = true;
            btnIcon.textContent = '⏳';
            btnText.textContent = 'Mendaftarkan Akun...';
            
            // Simulate registration process (remove this in production)
            setTimeout(() => {
                // Show success
                form.classList.remove('loading');
                form.classList.add('success');
                
                btnIcon.textContent = '✅';
                btnText.textContent = 'Pendaftaran Berhasil!';
                
                // Reset after 3 seconds (or redirect to login)
                setTimeout(() => {
                    form.classList.remove('success');
                    submitBtn.disabled = false;
                    btnIcon.textContent = '🚀';
                    btnText.textContent = 'Daftar Sekarang';
                    // window.location.href = '/login';
                }, 3000);
            }, 2500);
        });

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            const inputs = document.querySelectorAll('input');
            const password = document.getElementById('password');
            const passwordConfirm = document.getElementById('password_confirmation');
            
            // Real-time validation feedback
            inputs.forEach(input => {
                input.addEventListener('input', function() {
                    // Remove previous validation classes
                    this.classList.remove('input-valid', 'password-match', 'password-mismatch');
                    
                    if (this.value && this.validity.valid) {
                        this.classList.add('input-valid');
                    }
                });

                input.addEventListener('focus', function() {
                    this.parentElement.parentElement.style.transform = 'translateY(-1px)';
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.parentElement.style.transform = 'translateY(0)';
                });
            });

            // Password confirmation matching
            function checkPasswordMatch() {
                if (passwordConfirm.value && password.value) {
                    passwordConfirm.classList.remove('password-match', 'password-mismatch');
                    
                    if (password.value === passwordConfirm.value) {
                        passwordConfirm.classList.add('password-match');
                    } else {
                        passwordConfirm.classList.add('password-mismatch');
                    }
                }
            }
            
            if (password && passwordConfirm) {
                password.addEventListener('input', checkPasswordMatch);
                passwordConfirm.addEventListener('input', checkPasswordMatch);
            }

            // Email validation
            const emailInput = document.getElementById('email');
            if (emailInput) {
                emailInput.addEventListener('input', function() {
                    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                    this.classList.remove('input-valid');
                    
                    if (this.value && emailRegex.test(this.value)) {
                        this.classList.add('input-valid');
                    }
                });
            }

            // Name validation
            const nameInput = document.getElementById('name');
            if (nameInput) {
                nameInput.addEventListener('input', function() {
                    this.classList.remove('input-valid');
                    
                    if (this.value && this.value.length >= 2) {
                        this.classList.add('input-valid');
                    }
                });
            }

            // Password strength indicator
            if (password) {
                password.addEventListener('input', function() {
                    this.classList.remove('input-valid');
                    
                    if (this.value && this.value.length >= 8) {
                        this.classList.add('input-valid');
                    }
                });
            }

            // Keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'Enter') {
                    document.getElementById('registerForm').dispatchEvent(new Event('submit'));
                }
            });
        });
    </script>
</body>
</html>