<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Forgot Password - {{ config('app.name', 'Admin Rotan') }}</title>
    
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
                    <div class="absolute inset-0 bg-gradient-to-r from-orange-500 via-red-500 to-pink-500 rounded-2xl animate-spin" style="animation-duration: 8s;"></div>
                    <div class="relative bg-white rounded-2xl flex items-center justify-center w-full h-full">
                        <span class="text-2xl">🔐</span>
                    </div>
                </div>
                
                <h1 class="text-3xl font-bold bg-gradient-to-r from-gray-900 via-blue-800 to-purple-800 bg-clip-text text-transparent mb-2">
                    Reset Password
                </h1>
                <p class="text-gray-600 text-sm">Admin Rotan - Atur ulang password Anda</p>
            </div>

            <!-- Description -->
            <div class="bg-gradient-to-r from-blue-50 to-indigo-50 border border-blue-200 rounded-xl p-4 mb-6 relative">
                <div class="flex items-start space-x-3">
                    <span class="text-lg mt-0.5">💡</span>
                    <p class="text-blue-800 text-sm leading-relaxed">
                        Lupa password Anda? Tidak masalah. Cukup beri tahu kami alamat email Anda dan kami akan mengirimkan tautan reset password yang memungkinkan Anda memilih yang baru.
                    </p>
                </div>
            </div>

            <!-- Session Status (Hidden by default, show when needed) -->
            <div id="sessionStatus" class="hidden bg-gradient-to-r from-green-50 to-emerald-50 border border-green-200 rounded-xl p-4 mb-6">
                <div class="flex items-center space-x-3">
                    <span class="text-lg">✅</span>
                    <p class="text-green-800 font-medium text-sm">
                        Link reset password telah dikirim ke email Anda!
                    </p>
                </div>
            </div>

            <!-- Form -->
            <form id="resetForm" method="POST" action="{{ route('password.email') }}" class="space-y-6">
                @csrf

                <!-- Email Field -->
                <div class="space-y-2">
                    <label for="email" class="flex items-center gap-2 text-sm font-semibold text-gray-700">
                        <span class="flex items-center justify-center w-8 h-8 bg-gradient-to-r from-blue-500 to-purple-600 rounded-lg text-white text-sm">📧</span>
                        Email Address
                    </label>
                    <div class="relative">
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus
                               class="w-full px-4 py-3 border border-gray-200 rounded-xl text-sm bg-white/50 backdrop-blur-sm focus:outline-none focus:ring-2 focus:ring-blue-500/20 focus:border-blue-500 transition-all duration-200 hover:bg-white/70"
                               placeholder="masukkan email anda">
                    </div>
                    @error('email')
                        <div class="flex items-center mt-2 text-red-600 text-xs gap-2 bg-red-50 border border-red-200 rounded-lg p-2">
                            <span>⚠️</span>
                            <span>{{ $message }}</span>
                        </div>
                    @enderror
                    <div id="emailError" class="hidden flex items-center mt-2 text-red-600 text-xs gap-2 bg-red-50 border border-red-200 rounded-lg p-2">
                        <span>⚠️</span>
                        <span>Email tidak valid atau tidak ditemukan</span>
                    </div>
                </div>

                <!-- Submit Button -->
                <div class="mt-6">
                    <button type="submit" 
                            id="submitBtn"
                            class="w-full relative overflow-hidden bg-gradient-to-r from-blue-600 to-purple-600 text-white py-3 px-6 rounded-xl font-semibold text-sm shadow-lg hover:shadow-xl transform transition-all duration-200 hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-blue-500/50 group flex items-center justify-center gap-2">
                        <span id="btnIcon">🚀</span>
                        <span id="btnText">Kirim Link Reset Password</span>
                        <div class="absolute inset-0 bg-gradient-to-r from-blue-700 to-purple-700 opacity-0 group-hover:opacity-100 transition-opacity duration-200"></div>
                    </button>
                </div>
            </form>

            <!-- Back to Login -->
            <div class="text-center mt-6 pt-6 border-t border-gray-200">
                <a href="#" 
                   onclick="goBackToLogin()"
                   class="text-sm text-blue-600 hover:text-blue-800 font-medium transition-colors hover:underline flex items-center justify-center gap-2">
                    <span>←</span>
                    <span>Kembali ke halaman login</span>
                </a>
            </div>
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
    </style>

    <script>
        function goBackToLogin() {
            // alert('Navigasi ke halaman login...');
            window.location.href = '/login';
        }

        // Form handling
        document.getElementById('resetForm').addEventListener('submit', function(e) {
            // Uncomment untuk demo mode (prevent actual submission)
            // e.preventDefault();
            
            const form = this;
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            const sessionStatus = document.getElementById('sessionStatus');
            const submitBtn = document.getElementById('submitBtn');
            const btnIcon = document.getElementById('btnIcon');
            const btnText = document.getElementById('btnText');
            
            // Reset states
            emailError.classList.add('hidden');
            sessionStatus.classList.add('hidden');
            form.classList.remove('loading', 'success');
            
            // Basic email validation for demo
            if (!emailInput.value || !isValidEmail(emailInput.value)) {
                emailError.classList.remove('hidden');
                emailInput.focus();
                e.preventDefault(); // Prevent submission if invalid
                return;
            }
            
            // Show loading state
            form.classList.add('loading');
            submitBtn.disabled = true;
            btnIcon.textContent = '⏳';
            btnText.textContent = 'Mengirim Email...';
            
            // Simulate API call (remove this in production)
            setTimeout(() => {
                // Show success
                form.classList.remove('loading');
                form.classList.add('success');
                sessionStatus.classList.remove('hidden');
                
                btnIcon.textContent = '✅';
                btnText.textContent = 'Email Terkirim!';
                
                // Reset after 3 seconds
                setTimeout(() => {
                    form.classList.remove('success');
                    submitBtn.disabled = false;
                    btnIcon.textContent = '🚀';
                    btnText.textContent = 'Kirim Link Reset Password';
                    emailInput.value = '';
                }, 3000);
            }, 2000);
        });

        function isValidEmail(email) {
            const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
            return regex.test(email);
        }

        // Enhanced interactions
        document.addEventListener('DOMContentLoaded', function() {
            const emailInput = document.getElementById('email');
            const emailError = document.getElementById('emailError');
            
            emailInput.addEventListener('input', function() {
                if (emailError && !emailError.classList.contains('hidden')) {
                    emailError.classList.add('hidden');
                }
                
                if (this.value && isValidEmail(this.value)) {
                    this.style.borderColor = '#10b981';
                    this.style.boxShadow = '0 0 0 3px rgba(16, 185, 129, 0.1)';
                } else {
                    this.style.borderColor = '#e2e8f0';
                    this.style.boxShadow = '';
                }
            });

            emailInput.addEventListener('focus', function() {
                this.parentElement.style.transform = 'translateY(-1px)';
            });
            
            emailInput.addEventListener('blur', function() {
                this.parentElement.style.transform = 'translateY(0)';
            });
        });
    </script>
</body>
</html>