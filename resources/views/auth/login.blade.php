<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - {{ config('app.name', 'Admin Rotan') }}</title>
    
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    
    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="font-sans antialiased bg-gray-50">
    <div class="min-h-screen flex items-center justify-center py-12 px-4 sm:px-6 lg:px-8">
        <!-- Login Container - PERBAIKAN: max-width dibatasi -->
        <div class="max-w-sm w-full space-y-8">
            <!-- Login Card -->
            <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
                <!-- Header -->
                <div class="text-center mb-6">
                    <!-- Logo Placeholder -->
                    <div class="mx-auto w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mb-3">
                        <span class="text-white font-bold text-lg">AR</span>
                    </div>
                    <h2 class="text-xl font-bold text-gray-900">Admin Rotan</h2>
                    <p class="text-gray-600 text-sm mt-1">Masuk ke dashboard</p>
                </div>

                <!-- Login Form -->
                <form method="POST" action="{{ route('login') }}" class="space-y-4">
                    @csrf

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700 mb-1">
                            Email Address
                        </label>
                        <input id="email" 
                               type="email" 
                               name="email" 
                               value="{{ old('email') }}" 
                               required 
                               autofocus 
                               autocomplete="username"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="masukkan email anda">
                        @error('email')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Password -->
                    <div>
                        <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                            Password
                        </label>
                        <input id="password" 
                               type="password" 
                               name="password" 
                               required 
                               autocomplete="current-password"
                               class="w-full px-3 py-2 border border-gray-300 rounded-md text-sm focus:outline-none focus:ring-1 focus:ring-blue-500 focus:border-blue-500"
                               placeholder="masukkan password">
                        @error('password')
                            <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Remember Me & Forgot Password -->
                    <div class="flex items-center justify-between text-sm">
                        <label class="flex items-center">
                            <input type="checkbox" 
                                   name="remember" 
                                   class="h-3 w-3 text-blue-600 border-gray-300 rounded focus:ring-blue-500">
                            <span class="ml-2 text-gray-600">Remember me</span>
                        </label>

                        @if (Route::has('password.request'))
                            <a href="{{ route('password.request') }}" 
                               class="text-blue-600 hover:text-blue-500">
                                Lupa password?
                            </a>
                        @endif
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" 
                            class="w-full bg-blue-600 text-white py-2 px-4 rounded-md text-sm font-medium hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                        Masuk
                    </button>

                    <!-- Register Link -->
                    @if (Route::has('register'))
                        <div class="text-center text-sm">
                            <span class="text-gray-600">Belum punya akun? </span>
                            <a href="{{ route('register') }}" 
                               class="text-blue-600 hover:text-blue-500">
                                Daftar sekarang
                            </a>
                        </div>
                    @endif
                </form>
            </div>

            <!-- Footer -->
            <div class="text-center">
                <p class="text-xs text-gray-500">
                    © 2025 Admin Rotan. All rights reserved.
                </p>
            </div>
        </div>
    </div>

    <!-- Development Login Info -->
    @if (app()->environment('local'))
        <div class="fixed bottom-4 right-4 bg-white border border-gray-200 rounded-lg p-3 shadow-lg text-xs max-w-48">
            <p class="font-medium text-gray-700 mb-1">Test Login:</p>
            <p class="text-gray-600">admin@rotan.com</p>
            <p class="text-gray-600">admin123</p>
        </div>
    @endif
</body>
</html>