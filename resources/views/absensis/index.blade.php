<x-app-layout>
    @section('title', 'Data Absensi')

    <!-- CSS Override untuk Dark Theme Absensi Page -->
    <style>
        /* Custom Color Palette Variables */
        :root {
            --color-black: #242424;
            --color-gray: #6D6D6D;
            --color-light: #E7E7E7;
            --color-white: #FAFAFA;
        }

        /* KHUSUS UNTUK HALAMAN ABSENSI - Override main container */
        body.absensi-page main {
            max-width: none !important;
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
        }

        /* Override body background untuk absensi - Dark Theme */
        body.absensi-page {
            background: var(--color-black) !important;
        }

        /* Ensure no container constraints untuk absensi */
        body.absensi-page .max-w-7xl,
        body.absensi-page .container,
        body.absensi-page .mx-auto {
            max-width: none !important;
            margin: 0 !important;
        }

        /* Full width untuk absensi content */
        body.absensi-page main > * {
            width: 100%;
        }

        /* Custom padding untuk konten absensi - Dark Theme */
        body.absensi-page .absensi-content {
            padding: 1.5rem;
            background: var(--color-black);
            min-height: 100vh;
        }

        @media (min-width: 640px) {
            body.absensi-page .absensi-content {
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
        body.absensi-page table {
            width: 100%;
            max-width: 100%;
        }
        
        body.absensi-page th, 
        body.absensi-page td {
            word-wrap: break-word;
            overflow-wrap: break-word;
            max-width: 0;
        }

        /* Page Background Dark Theme */
        .page-background {
            background: var(--color-black) !important;
        }

        /* Header Dark Theme */
        .page-title {
            color: var(--color-white) !important;
        }

        .page-subtitle {
            color: var(--color-light) !important;
        }

        /* Action Buttons Dark Theme */
        .btn-purple {
            background: #8b5cf6 !important;
            border: 1px solid #a855f7 !important;
        }

        .btn-purple:hover {
            background: #7c3aed !important;
            box-shadow: 0 8px 25px rgba(139, 92, 246, 0.3) !important;
        }

        .btn-green {
            background: #10b981 !important;
            border: 1px solid #059669 !important;
        }

        .btn-green:hover {
            background: #059669 !important;
            box-shadow: 0 8px 25px rgba(16, 185, 129, 0.3) !important;
        }

        .btn-blue {
            background: #3b82f6 !important;
            border: 1px solid #2563eb !important;
        }

        .btn-blue:hover {
            background: #2563eb !important;
            box-shadow: 0 8px 25px rgba(59, 130, 246, 0.3) !important;
        }

        /* Stats Card Dark Theme */
        .stats-card {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            transition: all 0.3s ease;
        }

        .stats-card:hover {
            transform: translateY(-3px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5) !important;
            border-color: var(--color-light) !important;
        }

        .stats-icon-bg {
            background: rgba(16, 185, 129, 0.2) !important;
        }

        .stats-icon {
            color: #10b981 !important;
        }

        .stats-label {
            color: var(--color-light) !important;
        }

        .stats-value {
            color: var(--color-white) !important;
        }

        /* Main Content Card Dark Theme */
        .content-card {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
        }

        /* Table Dark Theme */
        .table-header {
            background: rgba(109, 109, 109, 0.1) !important;
        }

        .table-header-cell {
            color: var(--color-light) !important;
        }

        .table-body {
            background: var(--color-black) !important;
        }

        .table-row {
            border-bottom: 1px solid rgba(109, 109, 109, 0.2) !important;
        }

        .table-row:hover {
            background: rgba(109, 109, 109, 0.1) !important;
        }

        .table-cell {
            color: var(--color-white) !important;
        }

        .table-cell-secondary {
            color: var(--color-light) !important;
        }

        /* Employee Avatar Dark Theme */
        .employee-avatar {
            background: linear-gradient(135deg, #8b5cf6, #a855f7) !important;
        }

        /* Status Badges Dark Theme */
        .badge-hadir {
            background: rgba(16, 185, 129, 0.2) !important;
            color: #10b981 !important;
            border: 1px solid rgba(16, 185, 129, 0.3) !important;
        }

        .badge-izin {
            background: rgba(245, 158, 11, 0.2) !important;
            color: #f59e0b !important;
            border: 1px solid rgba(245, 158, 11, 0.3) !important;
        }

        .badge-tidak-hadir {
            background: rgba(239, 68, 68, 0.2) !important;
            color: #ef4444 !important;
            border: 1px solid rgba(239, 68, 68, 0.3) !important;
        }

        .badge-auto {
            background: rgba(59, 130, 246, 0.2) !important;
            color: #3b82f6 !important;
            border: 1px solid rgba(59, 130, 246, 0.3) !important;
        }

        .badge-manual {
            background: rgba(109, 109, 109, 0.2) !important;
            color: var(--color-light) !important;
            border: 1px solid rgba(109, 109, 109, 0.3) !important;
        }

        /* Action Links Dark Theme */
        .action-view {
            color: #3b82f6 !important;
        }

        .action-view:hover {
            color: #2563eb !important;
        }

        .action-edit {
            color: #10b981 !important;
        }

        .action-edit:hover {
            color: #059669 !important;
        }

        .action-delete {
            color: #ef4444 !important;
        }

        .action-delete:hover {
            color: #dc2626 !important;
        }

        /* Mobile Card View Dark Theme */
        .mobile-card {
            background: var(--color-black) !important;
        }

        .mobile-card:hover {
            background: rgba(109, 109, 109, 0.1) !important;
        }

        .mobile-card-title {
            color: var(--color-white) !important;
        }

        .mobile-card-subtitle {
            color: var(--color-light) !important;
        }

        .mobile-info-bg {
            background: rgba(109, 109, 109, 0.1) !important;
        }

        .mobile-info-label {
            color: var(--color-light) !important;
        }

        /* Mobile Action Buttons Dark Theme */
        .mobile-btn-view {
            background: rgba(59, 130, 246, 0.2) !important;
            color: #3b82f6 !important;
        }

        .mobile-btn-view:hover {
            background: rgba(59, 130, 246, 0.3) !important;
        }

        .mobile-btn-edit {
            background: rgba(16, 185, 129, 0.2) !important;
            color: #10b981 !important;
        }

        .mobile-btn-edit:hover {
            background: rgba(16, 185, 129, 0.3) !important;
        }

        .mobile-btn-delete {
            background: rgba(239, 68, 68, 0.2) !important;
            color: #ef4444 !important;
        }

        .mobile-btn-delete:hover {
            background: rgba(239, 68, 68, 0.3) !important;
        }

        /* Empty State Dark Theme */
        .empty-state-icon {
            color: var(--color-gray) !important;
        }

        .empty-state-title {
            color: var(--color-white) !important;
        }

        .empty-state-subtitle {
            color: var(--color-light) !important;
        }

        /* Pagination Dark Theme */
        .pagination-card {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.3) !important;
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
            body.absensi-page .absensi-content {
                padding: 1rem;
            }
        }
    </style>

    <!-- Script untuk menambah class absensi-page ke body -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.body.classList.add('absensi-page');
        });
    </script>

    <div class="min-h-screen page-background transition-colors duration-300">
        <div class="absensi-content w-full">
            
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h1 class="text-2xl sm:text-3xl font-bold page-title">
                            Data Absensi
                        </h1>
                        <p class="mt-1 text-sm page-subtitle">
                            Kelola data absensi karyawan dengan mudah
                        </p>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex flex-col sm:flex-row gap-3">
                        <a href="{{ route('absensis.bulk') }}" 
                           class="btn-purple inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            Absensi Harian
                        </a>
                        <a href="{{ route('absensis.export') }}" 
                           class="btn-green inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            Export Excel
                        </a>
                        <a href="{{ route('absensis.create') }}" 
                           class="btn-blue inline-flex items-center justify-center px-4 py-2.5 text-white text-sm font-medium rounded-lg transition-all duration-200 shadow-sm hover:shadow-md">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                            </svg>
                            Tambah Absensi
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                        <div class="ml-4">
                            <p class="text-sm font-medium stats-label">Total Absensi</p>
                            <p class="text-2xl font-bold stats-value">{{ $absensis->count() }}</p>
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
                                    Tanggal
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Karyawan
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Status
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Tipe Input
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold uppercase tracking-wider table-header-cell">
                                    Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody class="table-body divide-y divide-gray-200 dark:divide-gray-700">
                            @forelse($absensis as $absensi)
                                <tr class="table-row transition-colors duration-150">
                                    <td class="px-6 py-4 text-sm font-medium table-cell">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="text-sm font-medium table-cell">
                                            {{ $absensi->tanggal->format('d/m/Y') }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center">
                                                    <span class="text-sm font-medium text-white">
                                                        {{ substr($absensi->karyawan->nama ?? 'U', 0, 1) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium table-cell">
                                                    {{ $absensi->karyawan->nama ?? '-' }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($absensi->hadir)
                                            <span class="badge-hadir inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                                Hadir
                                            </span>
                                        @elseif($absensi->izin)
                                            <span class="badge-izin inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                                Izin
                                            </span>
                                        @else
                                            <span class="badge-tidak-hadir inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                                Tidak Hadir
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ ($absensi->is_auto_generated ?? false) ? 'badge-auto' : 'badge-manual' }}">
                                            {{ $absensi->batch_type_label ?? 'Manual' }}
                                        </span>
                                    </td>
                                    <td class="px-6 py-4 text-sm font-medium space-x-3">
                                        <a href="{{ route('absensis.show', $absensi) }}" 
                                           class="action-view transition-colors">
                                            Lihat
                                        </a>
                                        <a href="{{ route('absensis.edit', $absensi) }}" 
                                           class="action-edit transition-colors">
                                            Edit
                                        </a>
                                        <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="action-delete transition-colors" 
                                                    onclick="return confirm('⚠️ Yakin ingin hapus data absensi ini?\n\nTindakan ini tidak dapat dibatalkan.')">
                                                Hapus
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center">
                                            <svg class="w-16 h-16 empty-state-icon mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                            </svg>
                                            <h3 class="text-lg font-medium empty-state-title mb-2">Belum ada data absensi</h3>
                                            <p class="empty-state-subtitle mb-4">Mulai dengan menambah absensi baru atau gunakan fitur absensi harian</p>
                                            <div class="flex space-x-2">
                                                <a href="{{ route('absensis.bulk') }}" 
                                                   class="btn-purple inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                                    </svg>
                                                    Absensi Harian
                                                </a>
                                                <a href="{{ route('absensis.create') }}" 
                                                   class="btn-blue inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors">
                                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                                                    </svg>
                                                    Tambah Manual
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Mobile Card View -->
                <div class="md:hidden divide-y divide-gray-200 dark:divide-gray-700">
                    @forelse($absensis as $absensi)
                        <div class="mobile-card p-6 transition-colors">
                            <div class="flex items-start justify-between mb-4">
                                <div class="flex items-center">
                                    <div class="flex-shrink-0 h-12 w-12">
                                        <div class="employee-avatar h-12 w-12 rounded-full flex items-center justify-center">
                                            <span class="text-lg font-medium text-white">
                                                {{ substr($absensi->karyawan->nama ?? 'U', 0, 1) }}
                                            </span>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <h3 class="text-lg font-semibold mobile-card-title">
                                            {{ $absensi->karyawan->nama ?? '-' }}
                                        </h3>
                                        <p class="text-sm mobile-card-subtitle">{{ $absensi->tanggal->format('d/m/Y') }}</p>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-2 gap-4 mb-4">
                                <div class="mobile-info-bg rounded-lg p-3">
                                    <p class="text-xs font-medium mobile-info-label uppercase tracking-wide">Status</p>
                                    <div class="mt-1">
                                        @if($absensi->hadir)
                                            <span class="badge-hadir inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                                                Hadir
                                            </span>
                                        @elseif($absensi->izin)
                                            <span class="badge-izin inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                                                Izin
                                            </span>
                                        @else
                                            <span class="badge-tidak-hadir inline-flex items-center px-2 py-1 rounded-full text-xs font-medium">
                                                Tidak Hadir
                                            </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="mobile-info-bg rounded-lg p-3">
                                    <p class="text-xs font-medium mobile-info-label uppercase tracking-wide">Tipe Input</p>
                                    <div class="mt-1">
                                        <span class="inline-flex items-center px-2 py-1 rounded-full text-xs font-medium {{ ($absensi->is_auto_generated ?? false) ? 'badge-auto' : 'badge-manual' }}">
                                            {{ $absensi->batch_type_label ?? 'Manual' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex flex-wrap gap-2">
                                <a href="{{ route('absensis.show', $absensi) }}" 
                                   class="mobile-btn-view inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                    </svg>
                                    Lihat
                                </a>
                                <a href="{{ route('absensis.edit', $absensi) }}" 
                                   class="mobile-btn-edit inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                    Edit
                                </a>
                                <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" 
                                            class="mobile-btn-delete inline-flex items-center px-3 py-1.5 text-sm font-medium rounded-lg transition-colors" 
                                            onclick="return confirm('⚠️ Yakin ingin hapus data absensi ini?\n\nTindakan ini tidak dapat dibatalkan.')">
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <h3 class="text-lg font-medium empty-state-title mb-2">Belum ada data absensi</h3>
                            <p class="empty-state-subtitle mb-4">Mulai dengan menambah absensi baru atau gunakan fitur absensi harian</p>
                            <div class="flex justify-center space-x-2">
                                <a href="{{ route('absensis.bulk') }}" 
                                   class="btn-purple inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    Absensi Harian
                                </a>
                                <a href="{{ route('absensis.create') }}" 
                                   class="btn-blue inline-flex items-center px-4 py-2 text-white text-sm font-medium rounded-lg transition-colors">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                    </svg>
                                    Tambah Manual
                                </a>
                            </div>
                        </div>
                    @endforelse
                </div>
            </div>

            <!-- Pagination -->
            @if($absensis->hasPages())
                <div class="mt-8 flex justify-center">
                    <div class="pagination-card rounded-lg px-4 py-3">
                        {{ $absensis->links() }}
                    </div>
                </div>
            @endif
        </div>
    </div>

    {{-- Toast notification untuk UX yang lebih baik --}}
    @if(session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof window.showToast === 'function') {
                    window.showToast('{{ session('success') }}', 'success');
                }
            });
        </script>
    @endif

    @if(session('error'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                if (typeof window.showToast === 'function') {
                    window.showToast('{{ session('error') }}', 'error');
                }
            });
        </script>
    @endif

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌙 Absensi Dark Theme Loaded Successfully!');
        });
    </script>
</x-app-layout>