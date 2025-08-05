<x-app-layout>
    @section('title', 'Data Karyawan')

    <!-- CSS Override untuk Responsive Theme Karyawan Page -->
    <style>
        /* Dynamic Color Palette Variables - Light & Dark Mode Support */
        :root {
            /* Light mode colors - Updated to match image */
            --color-bg-primary: #F5F5F7;
            --color-bg-secondary: #FFFFFF;
            --color-text-primary: #1D1D1F;
            --color-text-secondary: #86868B;
            --color-border: #E5E5E7;
            --color-border-hover: #D2D2D7;
        }

        .dark {
            /* Dark mode colors */
            --color-bg-primary: #111827;
            --color-bg-secondary: #1F2937;
            --color-text-primary: #F9FAFB;
            --color-text-secondary: #D1D5DB;
            --color-border: #374151;
            --color-border-hover: #4B5563;
        }

        /* KHUSUS UNTUK HALAMAN KARYAWAN - Override main container */
        body.karyawan-page main {
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* Override body background untuk karyawan - Responsive Theme */
        body.karyawan-page {
            background: var(--color-bg-primary) !important;
            transition: background-color 0.3s ease;
        }

        /* Ensure no container constraints untuk karyawan */
        body.karyawan-page .max-w-7xl,
        body.karyawan-page .container,
        body.karyawan-page .mx-auto {
            max-width: none !important;
            margin: 0 !important;
        }

        /* Full width untuk karyawan content */
        body.karyawan-page main > * {
            width: 100%;
        }

        /* Custom padding untuk konten karyawan - Responsive Theme */
        body.karyawan-page .karyawan-content {
            padding: 1.5rem;
            background: var(--color-bg-primary);
            min-height: 100vh;
            transition: background-color 0.3s ease;
        }

        @media (min-width: 640px) {
            body.karyawan-page .karyawan-content {
                padding: 2rem;
            }
        }

        /* GLOBAL: Menghilangkan semua scrollbar */
        html {
            overflow-x: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        html::-webkit-scrollbar {
            display: none;
        }
        
        body {
            overflow-x: hidden;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        body::-webkit-scrollbar {
            display: none;
        }
        
        /* Menghilangkan scrollbar pada semua elemen */
        * {
            scrollbar-width: none !important;
            -ms-overflow-style: none !important;
        }
        
        *::-webkit-scrollbar {
            display: none !important;
            width: 0 !important;
            height: 0 !important;
        }
        
        *::-webkit-scrollbar-track {
            display: none !important;
        }
        
        *::-webkit-scrollbar-thumb {
            display: none !important;
        }
        
        /* Pastikan content tidak overflow */
        body.karyawan-page table {
            width: 100%;
            max-width: 100%;
        }
        
        body.karyawan-page th, 
        body.karyawan-page td {
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 0;
        }

        /* Page Background Responsive Theme */
        .page-background {
            background: var(--color-bg-primary) !important;
            transition: background-color 0.3s ease;
        }

        /* Header Responsive Theme */
        .page-title {
            color: var(--color-text-primary) !important;
            font-weight: 700 !important;
            transition: color 0.3s ease;
        }

        .page-subtitle {
            color: var(--color-text-secondary) !important;
            transition: color 0.3s ease;
        }

        /* Action Buttons Updated Theme */
        .btn-blue {
            background: #007AFF !important;
            border: 1px solid #007AFF !important;
            box-shadow: 0 1px 3px rgba(0, 122, 255, 0.12) !important;
            transition: all 0.3s ease;
        }

        .btn-blue:hover {
            background: #0056CC !important;
            box-shadow: 0 4px 12px rgba(0, 122, 255, 0.3) !important;
        }

        .btn-green {
            background: #34C759 !important;
            border: 1px solid #34C759 !important;
            box-shadow: 0 1px 3px rgba(52, 199, 89, 0.12) !important;
            transition: all 0.3s ease;
        }

        .btn-green:hover {
            background: #28A745 !important;
            box-shadow: 0 4px 12px rgba(52, 199, 89, 0.3) !important;
        }

        /* Stats Card Updated Theme */
        .stats-card {
            background: var(--color-bg-secondary) !important;
            border: 1px solid var(--color-border) !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.3s ease;
        }

        .dark .stats-card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3) !important;
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08) !important;
            border-color: #007AFF !important;
        }

        .dark .stats-card:hover {
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.4) !important;
        }

        .stats-icon-bg {
            background: rgba(0, 122, 255, 0.08) !important;
            transition: background-color 0.3s ease;
        }

        .stats-icon {
            color: #007AFF !important;
        }

        .stats-label {
            color: var(--color-text-secondary) !important;
            font-weight: 500 !important;
            transition: color 0.3s ease;
        }

        .stats-value {
            color: var(--color-text-primary) !important;
            font-weight: 700 !important;
            transition: color 0.3s ease;
        }

        /* Main Content Card Updated Theme */
        .content-card {
            background: var(--color-bg-secondary) !important;
            border: 1px solid var(--color-border) !important;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.04) !important;
            transition: all 0.3s ease;
        }

        .dark .content-card {
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3) !important;
        }

        /* Table Responsive Theme */
        .table-header {
            background: var(--color-bg-primary) !important;
            transition: background-color 0.3s ease;
        }

        .table-header-cell {
            color: var(--color-text-secondary) !important;
            font-weight: 600 !important;
            transition: color 0.3s ease;
        }

        .table-body {
            background: var(--color-bg-secondary) !important;
            transition: background-color 0.3s ease;
        }

        .table-row {
            border-bottom: 1px solid var(--color-border) !important;
            transition: all 0.3s ease;
        }

        .table-row:hover {
            background: var(--color-bg-primary) !important;
        }

        .table-cell {
            color: var(--color-text-primary) !important;
            transition: color 0.3s ease;
        }

        .table-cell-secondary {
            color: var(--color-text-secondary) !important;
            transition: color 0.3s ease;
        }

        /* Employee Avatar Updated Theme */
        .employee-avatar {
            background: linear-gradient(135deg, #007AFF, #5856D6) !important;
            transition: all 0.3s ease;
        }

        .dark .employee-avatar {
            background: linear-gradient(135deg, #0A84FF, #64D2FF) !important;
        }

        /* Status Badges Responsive Theme */
        .badge-aktif {
            background: rgba(25, 135, 84, 0.1) !important;
            color: #198754 !important;
            border: 1px solid rgba(25, 135, 84, 0.3) !important;
            transition: all 0.3s ease;
        }

        .badge-tidak-aktif {
            background: rgba(220, 53, 69, 0.1) !important;
            color: #dc3545 !important;
            border: 1px solid rgba(220, 53, 69, 0.3) !important;
            transition: all 0.3s ease;
        }

        /* Action Links Updated Theme */
        .action-view {
            color: #007AFF !important;
            transition: color 0.3s ease;
        }

        .action-view:hover {
            color: #0056CC !important;
        }

        .action-edit {
            color: #34C759 !important;
            transition: color 0.3s ease;
        }

        .action-edit:hover {
            color: #28A745 !important;
        }

        .action-delete {
            color: #FF3B30 !important;
            transition: color 0.3s ease;
        }

        .action-delete:hover {
            color: #D70015 !important;
        }

        /* Mobile Card View Responsive Theme */
        .mobile-card {
            background: var(--color-bg-secondary) !important;
            transition: all 0.3s ease;
        }

        .mobile-card:hover {
            background: var(--color-bg-primary) !important;
        }

        .mobile-card-title {
            color: var(--color-text-primary) !important;
            transition: color 0.3s ease;
        }

        .mobile-card-subtitle {
            color: var(--color-text-secondary) !important;
            transition: color 0.3s ease;
        }

        .mobile-info-bg {
            background: var(--color-bg-primary) !important;
            border: 1px solid var(--color-border) !important;
            transition: all 0.3s ease;
        }

        .mobile-info-label {
            color: var(--color-text-secondary) !important;
            font-weight: 500 !important;
            transition: color 0.3s ease;
        }

        /* Mobile Action Buttons Updated Theme */
        .mobile-btn-view {
            background: rgba(0, 122, 255, 0.08) !important;
            color: #007AFF !important;
            border: 1px solid rgba(0, 122, 255, 0.15) !important;
            transition: all 0.3s ease;
        }

        .mobile-btn-view:hover {
            background: rgba(0, 122, 255, 0.15) !important;
        }

        .mobile-btn-edit {
            background: rgba(52, 199, 89, 0.08) !important;
            color: #34C759 !important;
            border: 1px solid rgba(52, 199, 89, 0.15) !important;
            transition: all 0.3s ease;
        }

        .mobile-btn-edit:hover {
            background: rgba(52, 199, 89, 0.15) !important;
        }

        .mobile-btn-delete {
            background: rgba(255, 59, 48, 0.08) !important;
            color: #FF3B30 !important;
            border: 1px solid rgba(255, 59, 48, 0.15) !important;
            transition: all 0.3s ease;
        }

        .mobile-btn-delete:hover {
            background: rgba(255, 59, 48, 0.15) !important;
        }

        /* Empty State Responsive Theme */
        .empty-state-icon {
            color: var(--color-text-secondary) !important;
            transition: color 0.3s ease;
        }

        .empty-state-title {
            color: var(--color-text-primary) !important;
            transition: color 0.3s ease;
        }

        .empty-state-subtitle {
            color: var(--color-text-secondary) !important;
            transition: color 0.3s ease;
        }

        /* Pagination Responsive Theme */
        .pagination-card {
            background: var(--color-bg-secondary) !important;
            border: 1px solid var(--color-border) !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.3s ease;
        }

        .dark .pagination-card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;
        }

        /* Search Box Updated Theme */
        .search-box {
            background: var(--color-bg-secondary) !important;
            border: 1px solid var(--color-border) !important;
            color: var(--color-text-primary) !important;
            transition: all 0.3s ease;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.04) !important;
        }

        .search-box:focus {
            border-color: #007AFF !important;
            box-shadow: 0 0 0 3px rgba(0, 122, 255, 0.08) !important;
        }

        .search-box::placeholder {
            color: var(--color-text-secondary) !important;
        }

        /* Animation */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stats-card {
            animation: slideUp 0.6s ease-out;
        }

        .content-card {
            animation: slideUp 0.8s ease-out;
        }

        /* Responsive enhancements */
        @media (max-width: 768px) {
            body.karyawan-page .karyawan-content {
                padding: 1rem;
            }
        }
    </style>

    <!-- Script untuk menambah class karyawan-page ke body -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('karyawan-page');
        });
    </script>

    <div class="min-h-screen page-background transition-colors duration-300">
        <div class="karyawan-content w-full">
            
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold page-title">
                            Data Karyawan
                        </h1>
                        <p class="mt-1 text-sm page-subtitle">
                            Kelola data karyawan dengan sistem terintegrasi
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('karyawans.export') }}" 
                           class="btn-green inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export Excel
                        </a>
                        <a href="{{ route('karyawans.create') }}" 
                           class="btn-blue inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Karyawan
                        </a>
                    </div>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
                <div class="stats-card rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-2 stats-icon-bg rounded-lg">
                            <svg class="w-6 h-6 stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium stats-label">Total Karyawan</p>
                            <p class="text-2xl font-bold stats-value">4</p>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-2 stats-icon-bg rounded-lg">
                            <svg class="w-6 h-6 stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium stats-label">Karyawan Aktif</p>
                            <p class="text-2xl font-bold stats-value">4</p>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-2 stats-icon-bg rounded-lg">
                            <svg class="w-6 h-6 stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium stats-label">Total Berat Masuk (Kg)</p>
                            <p class="text-2xl font-bold stats-value">168</p>
                        </div>
                    </div>
                </div>
                
                <div class="stats-card rounded-xl p-6">
                    <div class="flex items-center">
                        <div class="p-2 stats-icon-bg rounded-lg">
                            <svg class="w-6 h-6 stats-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 6l3 1m0 0l-3 9a5.002 5.002 0 006.001 0M6 7l3 9M6 7l6-2m6 2l3-1m-3 1l-3 9a5.002 5.002 0 006.001 0M18 7l3 9m-3-9l-6-2m0-2v2m0 16V5m0 16H9m3 0h3"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium stats-label">Total Berat Keluar (Kg)</p>
                            <p class="text-2xl font-bold stats-value">147</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Search Box -->
            <div class="mb-6">
                <div class="relative">
                    <input type="text" 
                           placeholder="Cari karyawan..." 
                           class="search-box w-full px-4 py-3 pl-10 text-sm rounded-lg focus:outline-none">
                    <svg class="absolute left-3 top-3.5 w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                    </svg>
                </div>
            </div>

            <!-- Main Content Card -->
            <div class="content-card rounded-xl shadow-sm">
                
                <!-- Desktop Table View -->
                <div class="hidden md:block overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200 dark:divide-gray-700">
                        <thead class="table-header">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Karyawan
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Alamat
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    No. Telepon
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Berat Masuk
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Berat Keluar
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-body divide-y divide-gray-200 dark:divide-gray-700">
                            <!-- Sample Data dari gambar -->
                            <tr class="table-row transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center">
                                                <span class="text-sm font-medium text-white">SH</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium table-cell">Shokhihul Atiq</div>
                                            <div class="text-xs table-cell-secondary">ID: 4</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">Sidoarjo</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">081234567890</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-700">
                                        20 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-700">
                                        5 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-3">
                                    <a href="#" class="action-view transition-colors">Lihat</a>
                                    <a href="#" class="action-edit transition-colors">Edit</a>
                                    <button type="button" class="action-delete transition-colors" onclick="return confirm('⚠️ Yakin ingin menghapus data karyawan ini?\n\nTindakan ini tidak dapat dibatalkan.')">Hapus</button>
                                </td>
                            </tr>

                            <tr class="table-row transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center">
                                                <span class="text-sm font-medium text-white">BU</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium table-cell">Budi Santoso</div>
                                            <div class="text-xs table-cell-secondary">ID: 1</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">Jl. Rotan Raya No. 123, Jakarta</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">081234567890</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-700">
                                        51 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-700">
                                        48 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-3">
                                    <a href="#" class="action-view transition-colors">Lihat</a>
                                    <a href="#" class="action-edit transition-colors">Edit</a>
                                    <button type="button" class="action-delete transition-colors" onclick="return confirm('⚠️ Yakin ingin menghapus data karyawan ini?\n\nTindakan ini tidak dapat dibatalkan.')">Hapus</button>
                                </td>
                            </tr>

                            <tr class="table-row transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center">
                                                <span class="text-sm font-medium text-white">SI</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium table-cell">Siti Nurhaliza</div>
                                            <div class="text-xs table-cell-secondary">ID: 2</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">Jl. Bambu Indah No. 456, Bogor</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">081234567891</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-700">
                                        45 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-700">
                                        44 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-3">
                                    <a href="#" class="action-view transition-colors">Lihat</a>
                                    <a href="#" class="action-edit transition-colors">Edit</a>
                                    <button type="button" class="action-delete transition-colors" onclick="return confirm('⚠️ Yakin ingin menghapus data karyawan ini?\n\nTindakan ini tidak dapat dibatalkan.')">Hapus</button>
                                </td>
                            </tr>

                            <tr class="table-row transition-colors duration-150">
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center">
                                                <span class="text-sm font-medium text-white">AH</span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium table-cell">Ahmad Wijaya</div>
                                            <div class="text-xs table-cell-secondary">ID: 3</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">Jl. Anyaman No. 789, Depok</div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="text-sm table-cell">081234567892</div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-50 text-blue-700 dark:bg-blue-900/30 dark:text-blue-300 border border-blue-200 dark:border-blue-700">
                                        52 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-50 text-orange-700 dark:bg-orange-900/30 dark:text-orange-300 border border-orange-200 dark:border-orange-700">
                                        50 Kg
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-sm font-medium space-x-3">
                                    <a href="#" class="action-view transition-colors">Lihat</a>
                                    <a href="#" class="action-edit transition-colors">Edit</a>
                                    <button type="button" class="action-delete transition-colors" onclick="return confirm('⚠️ Yakin ingin menghapus data karyawan ini?\n\nTindakan ini tidak dapat dibatalkan.')">Hapus</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden divide-y divide-gray-200 dark:divide-gray-700">
                    <!-- Sample Mobile Cards -->
                    <div class="mobile-card p-6 transition-colors">
                        <div class="flex items-start justify-between mb-4">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-12 w-12">
                                    <div class="employee-avatar h-12 w-12 rounded-full flex items-center justify-center">
                                        <span class="text-lg font-medium text-white">SH</span>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <h3 class="text-lg font-semibold mobile-card-title">Shokhihul Atiq</h3>
                                    <p class="text-sm mobile-card-subtitle">ID: 4</p>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="mobile-info-bg rounded-lg p-3">
                                <p class="text-xs font-medium mobile-info-label uppercase tracking-wide">Berat Masuk</p>
                                <p class="text-lg font-bold text-blue-700 dark:text-blue-400">20 Kg</p>
                            </div>
                            <div class="mobile-info-bg rounded-lg p-3">
                                <p class="text-xs font-medium mobile-info-label uppercase tracking-wide">Berat Keluar</p>
                                <p class="text-lg font-bold text-orange-700 dark:text-orange-400">5 Kg</p>
                            </div>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-xs font-medium mobile-info-label uppercase tracking-wide mb-1">Alamat</p>
                            <p class="text-sm mobile-card-title">Sidoarjo</p>
                        </div>
                        
                        <div class="mb-4">
                            <p class="text-xs font-medium mobile-info-label uppercase tracking-wide mb-1">No. Telepon</p>
                            <p class="text-sm mobile-card-title">081234567890</p>
                        </div>
                        
                        <div class="flex flex-wrap gap-2">
                            <a href="#" class="mobile-btn-view inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                </svg>
                                Lihat
                            </a>
                            <a href="#" class="mobile-btn-edit inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                                Edit
                            </a>
                            <button type="button" class="mobile-btn-delete inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors" onclick="return confirm('⚠️ Yakin ingin menghapus data karyawan ini?\n\nTindakan ini tidak dapat dibatalkan.')">
                                <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                </svg>
                                Hapus
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌓 Karyawan Responsive Theme Loaded Successfully!');
            
            // Log current theme
            const isDark = document.documentElement.classList.contains('dark');
            console.log('Current theme:', isDark ? 'Dark' : 'Light');
            
            // Search functionality
            const searchBox = document.querySelector('.search-box');
            if (searchBox) {
                searchBox.addEventListener('input', function() {
                    // Basic search functionality can be implemented here
                    console.log('Searching for:', this.value);
                });
            }
        });
    </script>
</x-app-layout>