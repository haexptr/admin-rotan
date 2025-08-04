<x-app-layout>
    @section('title', 'Employee Overview')

    <style>
        /* Custom Color Palette Variables */
        :root {
            --color-black: #242424;
            --color-gray: #6D6D6D;
            --color-light: #E7E7E7;
            --color-white: #FAFAFA;
        }

        /* PERBAIKAN: Override container constraints */
        body, html {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            background: var(--color-black) !important;
        }

        main, [role="main"], .min-h-screen {
            margin: 0 !important;
            padding: 0 !important;
            width: 100% !important;
            max-width: none !important;
            background: var(--color-black) !important;
        }

        .max-w-7xl,
        .container,
        .mx-auto {
            max-width: none !important;
            width: 100% !important;
            margin: 0 !important;
            padding: 0 !important;
        }

        /* Employee page container - FULL WIDTH - Dark Theme */
        .employee-container {
            padding: 1.5rem;
            margin: 0;
            background: var(--color-black);
            min-height: 100vh;
            width: 100%;
            box-sizing: border-box;
        }

        /* Menghilangkan scrollbar pada semua elemen */
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        
        *::-webkit-scrollbar {
            width: 0px;
            background: transparent;
        }
        
        /* Menghilangkan scrollbar horizontal */
        body {
            overflow-x: hidden;
        }
        
        /* Pastikan tabel tidak overflow */
        table {
            table-layout: fixed;
            width: 100%;
        }
        
        /* Batasi lebar kolom agar tidak overflow */
        th, td {
            word-wrap: break-word;
            overflow-wrap: break-word;
        }

        /* Header Dark Theme */
        .page-header h1 {
            color: var(--color-white) !important;
        }

        .page-header .divider {
            background: var(--color-light) !important;
        }

        /* Buttons Dark Theme */
        .btn-export {
            color: #10b981 !important;
            background: var(--color-black) !important;
            border-color: rgba(16, 185, 129, 0.3) !important;
        }

        .btn-export:hover {
            background: rgba(16, 185, 129, 0.1) !important;
            border-color: rgba(16, 185, 129, 0.5) !important;
        }

        .btn-primary {
            background: var(--color-gray) !important;
            color: var(--color-white) !important;
            border: 1px solid var(--color-light) !important;
        }

        .btn-primary:hover {
            background: var(--color-light) !important;
            color: var(--color-black) !important;
        }

        /* Stats Cards Dark Theme */
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

        .stats-card .stat-number {
            color: var(--color-white) !important;
        }

        .stats-card .stat-label {
            color: var(--color-light) !important;
        }

        /* Icon backgrounds dengan transparansi */
        .icon-blue {
            background: rgba(59, 130, 246, 0.2) !important;
        }

        .icon-green {
            background: rgba(16, 185, 129, 0.2) !important;
        }

        .icon-purple {
            background: rgba(139, 92, 246, 0.2) !important;
        }

        .icon-orange {
            background: rgba(245, 158, 11, 0.2) !important;
        }

        /* Success Message Dark Theme */
        .success-message {
            background: rgba(16, 185, 129, 0.1) !important;
            border-color: rgba(16, 185, 129, 0.3) !important;
            color: #10b981 !important;
        }

        /* Table Card Dark Theme */
        .table-card {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
        }

        .table-header {
            border-bottom: 1px solid var(--color-gray) !important;
        }

        .table-title {
            color: var(--color-white) !important;
        }

        .table-subtitle {
            color: var(--color-light) !important;
        }

        /* Search Input Dark Theme */
        .search-input {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            color: var(--color-white) !important;
        }

        .search-input:focus {
            border-color: var(--color-light) !important;
            box-shadow: 0 0 0 2px rgba(231, 231, 231, 0.2) !important;
        }

        .search-input::placeholder {
            color: var(--color-gray) !important;
        }

        /* Table Dark Theme */
        .table-header-row {
            border-bottom: 1px solid var(--color-gray) !important;
        }

        .table-header-cell {
            color: var(--color-light) !important;
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

        /* Employee Avatar */
        .employee-avatar {
            background: linear-gradient(135deg, var(--color-gray), var(--color-light)) !important;
        }

        /* Status Badges Dark Theme */
        .badge-green {
            background: rgba(16, 185, 129, 0.2) !important;
            color: #10b981 !important;
            border: 1px solid rgba(16, 185, 129, 0.3) !important;
        }

        .badge-orange {
            background: rgba(245, 158, 11, 0.2) !important;
            color: #f59e0b !important;
            border: 1px solid rgba(245, 158, 11, 0.3) !important;
        }

        /* Action Links Dark Theme */
        .action-view {
            color: var(--color-light) !important;
        }

        .action-view:hover {
            color: var(--color-white) !important;
        }

        .action-edit {
            color: #f59e0b !important;
        }

        .action-edit:hover {
            color: #fbbf24 !important;
        }

        .action-delete {
            color: #ef4444 !important;
        }

        .action-delete:hover {
            color: #f87171 !important;
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

        /* Responsive */
        @media (max-width: 1024px) {
            .employee-container {
                padding: 1rem;
            }
        }

        @media (max-width: 768px) {
            .employee-container {
                padding: 0.75rem;
            }
        }

        /* Animation */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .stats-card {
            animation: slideUp 0.6s ease-out;
        }

        .table-card {
            animation: slideUp 0.8s ease-out;
        }
    </style>

    <div class="employee-container">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 page-header">
            <div>
                <h1 class="text-2xl font-light tracking-tight">Employee Overview</h1>
                <div class="w-12 h-0.5 mt-2 divider"></div>
            </div>
            <div class="flex items-center gap-3">
                <!-- Export Button -->
                <a href="{{ route('karyawans.export') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 btn-export">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>

                <a href="{{ route('karyawans.create') }}" 
                   class="inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 btn-primary">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Karyawan
                </a>
            </div>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
            <!-- Total Employees -->
            <div class="stats-card rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 icon-blue rounded-xl">
                            <svg class="w-6 h-6 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold stat-number">{{ $stats['total_employees'] ?? 0 }}</div>
                    <p class="text-sm mt-1 stat-label">Total Karyawan</p>
                </div>
            </div>

            <!-- Active Employees -->
            <div class="stats-card rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 icon-green rounded-xl">
                            <svg class="w-6 h-6 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold stat-number">{{ $stats['active_employees'] ?? 0 }}</div>
                    <p class="text-sm mt-1 stat-label">Karyawan Aktif</p>
                </div>
            </div>

            <!-- Total Weight In -->
            <div class="stats-card rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 icon-purple rounded-xl">
                            <svg class="w-6 h-6 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold stat-number">{{ number_format($stats['total_weight_in'] ?? 0, 0, ',', '.') }}</div>
                    <p class="text-sm mt-1 stat-label">Total Berat Masuk (Kg)</p>
                </div>
            </div>

            <!-- Total Weight Out -->
            <div class="stats-card rounded-2xl p-6">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 icon-orange rounded-xl">
                            <svg class="w-6 h-6 text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold stat-number">{{ number_format($stats['total_weight_out'] ?? 0, 0, ',', '.') }}</div>
                    <p class="text-sm mt-1 stat-label">Total Berat Keluar (Kg)</p>
                </div>
            </div>
        </div>

        <!-- Success Message -->
        @if(session('karyawan_success'))
            <div class="success-message border px-4 py-3 rounded-lg flex items-center space-x-2 transition-colors duration-200 mb-6">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('karyawan_success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto hover:opacity-80">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Table Card -->
        <div class="table-card rounded-2xl">
            <!-- Search Header -->
            <div class="p-6 table-header">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-lg font-semibold table-title">Data Karyawan</h2>
                        <p class="text-sm mt-1 table-subtitle">Kelola informasi karyawan perusahaan</p>
                    </div>
                    <!-- Search Box -->
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-4 w-4" style="color: var(--color-gray);" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                            </svg>
                        </div>
                        <input type="text" 
                               id="searchEmployee" 
                               placeholder="Cari karyawan..." 
                               class="search-input pl-10 pr-4 py-2.5 rounded-lg text-sm focus:ring-2 focus:ring-opacity-50 transition-colors duration-200 w-full sm:w-64">
                    </div>
                </div>
            </div>

            <div>
                <table class="w-full">
                    <thead>
                        <tr class="table-header-row">
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Karyawan</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Alamat</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">No. Telepon</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Berat Masuk</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Berat Keluar</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-opacity-20">
                        @forelse($karyawans ?? [] as $index => $karyawan)
                            <tr class="table-row transition-colors duration-150 employee-row">
                                <td class="py-4 px-6">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="employee-avatar h-10 w-10 rounded-full flex items-center justify-center shadow-sm">
                                                <span class="text-sm font-semibold text-white">
                                                    {{ strtoupper(substr($karyawan->nama ?? 'N/A', 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium table-cell employee-name">{{ $karyawan->nama ?? 'N/A' }}</div>
                                            <div class="text-xs table-cell-secondary">ID: {{ $karyawan->id_karyawan ?? 'N/A' }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="py-4 px-6 text-sm table-cell">{{ Str::limit($karyawan->alamat ?? 'N/A', 40) }}</td>
                                <td class="py-4 px-6 text-sm table-cell">{{ $karyawan->no_telp ?? 'N/A' }}</td>
                                <td class="py-4 px-6 text-sm">
                                    @if(($karyawan->memuat_timbangan_in ?? 0) > 0)
                                        <span class="badge-green inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                            {{ number_format($karyawan->memuat_timbangan_in, 0, ',', '.') }} Kg
                                        </span>
                                    @else
                                        <span style="color: var(--color-gray);">-</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm">
                                    @if(($karyawan->memuat_timbangan_out ?? 0) > 0)
                                        <span class="badge-orange inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium">
                                            {{ number_format($karyawan->memuat_timbangan_out, 0, ',', '.') }} Kg
                                        </span>
                                    @else
                                        <span style="color: var(--color-gray);">-</span>
                                    @endif
                                </td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('karyawans.show', $karyawan->id_karyawan ?? '') }}" 
                                           class="action-view text-sm font-medium transition-colors duration-150">Lihat</a>
                                        <a href="{{ route('karyawans.edit', $karyawan->id_karyawan ?? '') }}" 
                                           class="action-edit text-sm font-medium transition-colors duration-150">Edit</a>
                                        <form action="{{ route('karyawans.destroy', $karyawan->id_karyawan ?? '') }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" 
                                                    class="action-delete text-sm font-medium transition-colors duration-150">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 empty-state-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                    </svg>
                                    <h3 class="mt-4 text-sm font-medium empty-state-title">Belum ada karyawan</h3>
                                    <p class="mt-2 text-sm empty-state-subtitle">Mulai dengan menambahkan karyawan pertama Anda.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if(isset($karyawans) && $karyawans->hasPages())
            <div class="mt-6">
                {{ $karyawans->links() }}
            </div>
        @endif
    </div>

    <!-- Enhanced JavaScript for Search -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const searchInput = document.getElementById('searchEmployee');
            const tableRows = document.querySelectorAll('.employee-row');
            let searchTimeout;

            // Enhanced search with debouncing
            if (searchInput) {
                searchInput.addEventListener('input', function() {
                    clearTimeout(searchTimeout);
                    const searchTerm = this.value.toLowerCase().trim();
                    
                    searchTimeout = setTimeout(() => {
                        let visibleCount = 0;
                        
                        tableRows.forEach(row => {
                            const employeeName = row.querySelector('.employee-name')?.textContent.toLowerCase() || '';
                            const employeeAddress = row.querySelector('td:nth-child(2)')?.textContent.toLowerCase() || '';
                            const employeePhone = row.querySelector('td:nth-child(3)')?.textContent.toLowerCase() || '';
                            
                            const isVisible = !searchTerm || 
                                employeeName.includes(searchTerm) || 
                                employeeAddress.includes(searchTerm) || 
                                employeePhone.includes(searchTerm);
                            
                            if (isVisible) {
                                row.style.display = '';
                                visibleCount++;
                            } else {
                                row.style.display = 'none';
                            }
                        });
                    }, 300);
                });
            }

            // Delete confirmation
            const deleteButtons = document.querySelectorAll('form[action*="destroy"] button[type="submit"]');
            deleteButtons.forEach(button => {
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    
                    const form = this.closest('form');
                    const employeeRow = this.closest('tr');
                    const employeeName = employeeRow?.querySelector('.employee-name')?.textContent || 'karyawan ini';
                    
                    const result = confirm(`Yakin ingin menghapus karyawan "${employeeName}"?`);
                    
                    if (result && form) {
                        form.submit();
                    }
                });
            });

            console.log('🌙 Employee Dark Theme Loaded Successfully!');
        });
    </script>
</x-app-layout>