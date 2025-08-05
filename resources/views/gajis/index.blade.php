<x-app-layout>
    @section('title', 'Data Gaji')

    <!-- CSS Override untuk Responsive Theme Gaji Page -->
    <style>
        /* Dynamic Color Palette Variables - Light & Dark Mode Support */
        :root {
            /* Light mode colors */
            --color-bg-primary: #F8F9FA;
            --color-bg-secondary: #FFFFFF;
            --color-text-primary: #212529;
            --color-text-secondary: #6C757D;
            --color-border: #DEE2E6;
            --color-border-hover: #CED4DA;
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

        /* KHUSUS UNTUK HALAMAN GAJI - Override main container */
        body.gaji-page main {
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* Override body background untuk gaji - Responsive Theme */
        body.gaji-page {
            background: var(--color-bg-primary) !important;
            transition: background-color 0.3s ease;
        }

        /* Ensure no container constraints untuk gaji */
        body.gaji-page .max-w-7xl,
        body.gaji-page .container,
        body.gaji-page .mx-auto {
            max-width: none !important;
            margin: 0 !important;
        }

        /* Full width untuk gaji content */
        body.gaji-page main > * {
            width: 100%;
        }

        /* Custom padding untuk konten gaji - Responsive Theme */
        body.gaji-page .gaji-content {
            padding: 1.5rem;
            background: var(--color-bg-primary);
            min-height: 100vh;
            transition: background-color 0.3s ease;
        }

        @media (min-width: 640px) {
            body.gaji-page .gaji-content {
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
        body.gaji-page table {
            width: 100%;
            max-width: 100%;
        }
        
        body.gaji-page th, 
        body.gaji-page td {
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

        /* Action Buttons Responsive Theme */
        .btn-green {
            background: #198754 !important;
            border: 1px solid #198754 !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12) !important;
            transition: all 0.3s ease;
        }

        .btn-green:hover {
            background: #146c43 !important;
            box-shadow: 0 4px 12px rgba(25, 135, 84, 0.3) !important;
        }

        .btn-blue {
            background: #0d6efd !important;
            border: 1px solid #0d6efd !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12) !important;
            transition: all 0.3s ease;
        }

        .btn-blue:hover {
            background: #0b5ed7 !important;
            box-shadow: 0 4px 12px rgba(13, 110, 253, 0.3) !important;
        }

        /* Stats Card Responsive Theme */
        .stats-card {
            background: var(--color-bg-secondary) !important;
            border: 1px solid var(--color-border) !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.3s ease;
        }

        .dark .stats-card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;
        }

        .stats-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
            border-color: #0d6efd !important;
        }

        .dark .stats-card:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.4) !important;
        }

        .stats-icon-bg {
            background: rgba(13, 110, 253, 0.1) !important;
        }

        .stats-icon {
            color: #0d6efd !important;
        }

        .stats-label {
            color: var(--color-text-secondary) !important;
            font-weight: 500 !important;
        }

        .stats-value {
            color: var(--color-text-primary) !important;
            font-weight: 700 !important;
        }

        /* Main Content Card Responsive Theme */
        .content-card {
            background: var(--color-bg-secondary) !important;
            border: 1px solid var(--color-border) !important;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.1) !important;
            transition: all 0.3s ease;
        }

        .dark .content-card {
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.3) !important;
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

        /* Employee Avatar Responsive Theme */
        .employee-avatar {
            background: linear-gradient(135deg, #0d6efd, #6c757d) !important;
        }

        .dark .employee-avatar {
            background: linear-gradient(135deg, #60a5fa, #9ca3af) !important;
        }

        /* Salary Amount Colors */
        .salary-mingguan {
            color: #198754 !important;
            font-weight: 600 !important;
        }

        .salary-bulanan {
            color: #0d6efd !important;
            font-weight: 600 !important;
        }

        /* Action Links Light Theme */
        .action-view {
            color: #0d6efd !important;
        }

        .action-view:hover {
            color: #0b5ed7 !important;
        }

        .action-edit {
            color: #198754 !important;
        }

        .action-edit:hover {
            color: #146c43 !important;
        }

        .action-delete {
            color: #dc3545 !important;
        }

        .action-delete:hover {
            color: #b02a37 !important;
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

        /* Mobile Salary Cards Responsive Theme */
        .mobile-salary-mingguan {
            background: rgba(25, 135, 84, 0.1) !important;
            border: 1px solid rgba(25, 135, 84, 0.2) !important;
            transition: all 0.3s ease;
        }

        .mobile-salary-mingguan-label {
            color: #198754 !important;
            font-weight: 600 !important;
        }

        .mobile-salary-mingguan-value {
            color: #146c43 !important;
            font-weight: 700 !important;
        }

        .mobile-salary-bulanan {
            background: rgba(13, 110, 253, 0.1) !important;
            border: 1px solid rgba(13, 110, 253, 0.2) !important;
            transition: all 0.3s ease;
        }

        .mobile-salary-bulanan-label {
            color: #0d6efd !important;
            font-weight: 600 !important;
        }

        .mobile-salary-bulanan-value {
            color: #0b5ed7 !important;
            font-weight: 700 !important;
        }

        /* Mobile Action Buttons Responsive Theme */
        .mobile-btn-view {
            background: rgba(13, 110, 253, 0.1) !important;
            color: #0d6efd !important;
            border: 1px solid rgba(13, 110, 253, 0.2) !important;
            transition: all 0.3s ease;
        }

        .mobile-btn-view:hover {
            background: rgba(13, 110, 253, 0.2) !important;
        }

        .mobile-btn-edit {
            background: rgba(25, 135, 84, 0.1) !important;
            color: #198754 !important;
            border: 1px solid rgba(25, 135, 84, 0.2) !important;
            transition: all 0.3s ease;
        }

        .mobile-btn-edit:hover {
            background: rgba(25, 135, 84, 0.2) !important;
        }

        .mobile-btn-delete {
            background: rgba(220, 53, 69, 0.1) !important;
            color: #dc3545 !important;
            border: 1px solid rgba(220, 53, 69, 0.2) !important;
            transition: all 0.3s ease;
        }

        .mobile-btn-delete:hover {
            background: rgba(220, 53, 69, 0.2) !important;
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
            body.gaji-page .gaji-content {
                padding: 1rem;
            }
        }
    </style>

    <!-- Script untuk menambah class gaji-page ke body -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('gaji-page');
        });
    </script>

    <div class="min-h-screen page-background transition-colors duration-300">
        <div class="gaji-content w-full">
            
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold page-title">
                            Data Gaji
                        </h1>
                        <p class="mt-1 text-sm page-subtitle">
                            Kelola data gaji karyawan dengan mudah
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('gajis.export') }}" 
                           class="btn-green inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export Excel
                        </a>
                        <a href="{{ route('gajis.create') }}" 
                           class="btn-blue inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Gaji
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
                            <p class="text-2xl font-bold stats-value">{{ $gajis->count() }}</p>
                        </div>
                    </div>
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
                                    No
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Karyawan
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Gaji Mingguan
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Gaji Bulanan
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-body divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($gajis as $gaji)
                                <tr class="table-row transition-colors duration-150">
                                    <td class="px-6 py-4 text-sm font-medium table-cell">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center">
                                                    <span class="text-sm font-medium text-white">
                                                        {{ substr($gaji->karyawan->nama ?? 'U', 0, 1) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium table-cell">
                                                    {{ $gaji->karyawan->nama ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold salary-mingguan">
                                            Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="text-sm font-semibold salary-bulanan">
                                            Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium space-x-3">
                                        <a href="{{ route('gajis.show', $gaji) }}" 
                                           class="action-view transition-colors">
                                            Lihat
                                        </a>
                                        <a href="{{ route('gajis.edit', $gaji) }}" 
                                           class="action-edit transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('gajis.destroy', $gaji) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="action-delete transition-colors" 
                                                    onclick="return confirm('⚠️ Yakin ingin menghapus data gaji ini?\n\nTindakan ini tidak dapat dibatalkan.')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-16 h-16 empty-state-icon mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                                            </svg>
                                            <h3 class="text-lg font-medium empty-state-title mb-2">Belum ada data gaji</h3>
                                            <p class="empty-state-subtitle mb-4">Mulai dengan menambahkan data gaji karyawan pertama</p>
                                            <a href="{{ route('gajis.create') }}" 
                                               class="btn-blue inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors">
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                </svg>
                                                Tambah Gaji Pertama
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($gajis as $gaji)
                        <div class="mobile-card p-6 transition-colors">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="employee-avatar h-12 w-12 rounded-full flex items-center justify-center">
                                            <span class="text-lg font-medium text-white">
                                                {{ substr($gaji->karyawan->nama ?? 'U', 0, 1) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold mobile-card-title">
                                            {{ $gaji->karyawan->nama ?? '-' }}
                                        </h3>
                                        <p class="text-sm mobile-card-subtitle">Karyawan #{{ $loop->iteration }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="mobile-salary-mingguan rounded-lg p-3">
                                    <p class="text-xs font-medium mobile-salary-mingguan-label uppercase tracking-wide">Mingguan</p>
                                    <p class="text-lg font-bold mobile-salary-mingguan-value">
                                        Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}
                                    </p>
                                </div>
                                <div class="mobile-salary-bulanan rounded-lg p-3">
                                    <p class="text-xs font-medium mobile-salary-bulanan-label uppercase tracking-wide">Bulanan</p>
                                    <p class="text-lg font-bold mobile-salary-bulanan-value">
                                        Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}
                                    </p>
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('gajis.show', $gaji) }}" 
                                   class="mobile-btn-view inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </a>
                                <a href="{{ route('gajis.edit', $gaji) }}" 
                                   class="mobile-btn-edit inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('gajis.destroy', $gaji) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="mobile-btn-delete inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors" 
                                            onclick="return confirm('⚠️ Yakin ingin menghapus data gaji ini?\n\nTindakan ini tidak dapat dibatalkan.')">
                                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                        </svg>
                                        Hapus
                                    </button>
                                </form>
                            </div>
                        </div>
                    @empty
                        <div class="p-12 text-center">
                            <svg class="w-16 h-16 empty-state-icon mx-auto mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4"></path>
                            </svg>
                            <h3 class="text-lg font-medium empty-state-title mb-2">Belum ada data gaji</h3>
                            <p class="empty-state-subtitle mb-4">Mulai dengan menambahkan data gaji karyawan pertama</p>
                            <a href="{{ route('gajis.create') }}" 
                               class="btn-blue inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                </svg>
                                Tambah Gaji Pertama
                            </a>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Pagination -->
            @if($gajis->hasPages())
                <div class="mt-8 flex justify-center">
                    <div class="pagination-card rounded-lg px-4 py-3">
                        {{ $gajis->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌓 Gaji Responsive Theme Loaded Successfully!');
            
            // Log current theme
            const isDark = document.documentElement.classList.contains('dark');
            console.log('Current theme:', isDark ? 'Dark' : 'Light');
        });
    </script>
</x-app-layout>