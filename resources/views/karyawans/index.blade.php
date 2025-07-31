<x-app-layout>
    @section('title', 'Employee Overview')

    <!-- ISOLATE CSS - Prevent conflict with layout -->
    <style scoped>
        /* Pastikan CSS hanya berlaku untuk konten karyawan, BUKAN sidebar */
        .karyawan-content * {
            /* Reset untuk mencegah conflict */
        }
        
        .karyawan-content @keyframes fadeIn {
            from { opacity: 0; transform: translateY(-10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .karyawan-content .employee-row:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
        }
        
        .dark .karyawan-content .employee-row:hover {
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.2);
        }
        
        .karyawan-content .pagination-wrapper nav {
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }
        
        .karyawan-content .pagination-wrapper nav a,
        .karyawan-content .pagination-wrapper nav span {
            @apply px-3 py-2 text-sm border border-gray-300 dark:border-gray-600 rounded-md bg-white dark:bg-gray-800 text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200;
        }
        
        .karyawan-content .pagination-wrapper nav span[aria-current="page"] {
            @apply bg-blue-600 text-white border-blue-600;
        }

        /* PENTING: Pastikan sidebar tidak terpengaruh */
        aside.sidebar-green {
            width: 14rem !important;
            min-width: 14rem !important;
            max-width: 14rem !important;
            position: fixed !important;
            top: 0 !important;
            left: 0 !important;
            height: 100vh !important;
            z-index: 50 !important;
        }
        
        /* Pastikan main content tidak overlap dengan sidebar */
        .main-content-karyawan {
            margin-left: 14rem !important;
            width: calc(100% - 14rem) !important;
        }
    </style>

    <div class="karyawan-content space-y-6">
        <!-- Header -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900 dark:text-white">Employee Overview</h1>
                <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kelola data karyawan perusahaan rotan</p>
            </div>
            <a href="{{ route('karyawans.create') }}" 
               class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-900">
                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                </svg>
                <span>Tambah Karyawan</span>
            </a>
        </div>

        <!-- Stats Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
            <!-- Total Employees -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-colors duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_employees'] }}</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Karyawan</p>
                </div>
            </div>

            <!-- Active Employees -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-colors duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['active_employees'] }}</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Karyawan Aktif</p>
                </div>
            </div>

            <!-- Total Weight In -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-colors duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_weight_in'], 0, ',', '.') }}</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Berat Masuk (Kg)</p>
                </div>
            </div>

            <!-- Total Weight Out -->
            <div class="bg-white dark:bg-gray-800 p-6 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-colors duration-200">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-3">
                        <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-lg">
                            <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="mt-4">
                    <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_weight_out'], 0, ',', '.') }}</div>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Total Berat Keluar (Kg)</p>
                </div>
            </div>
        </div>

        <!-- Success Message - KHUSUS UNTUK KARYAWAN -->
        @if(session('karyawan_success'))
            <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-200 px-4 py-3 rounded-lg flex items-center space-x-2 transition-colors duration-200">
                <svg class="w-5 h-5 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                </svg>
                <span class="text-sm font-medium">{{ session('karyawan_success') }}</span>
                <button onclick="this.parentElement.remove()" class="ml-auto text-green-600 dark:text-green-400 hover:text-green-800 dark:hover:text-green-200">
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                </button>
            </div>
        @endif

        <!-- Employees Section -->
        <div class="bg-white dark:bg-gray-800 rounded-xl shadow-sm border border-gray-200 dark:border-gray-700 transition-colors duration-200">
            <!-- Section Header -->
            <div class="p-6 border-b border-gray-200 dark:border-gray-700">
                <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                    <div>
                        <h2 class="text-xl font-semibold text-gray-900 dark:text-white">Data Karyawan</h2>
                        <p class="text-sm text-gray-600 dark:text-gray-400 mt-1">Kelola informasi karyawan perusahaan</p>
                    </div>
                    <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-3">
                        <!-- Search Box -->
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                <svg class="h-4 w-4 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                            </div>
                            <input type="text" 
                                   id="searchEmployee" 
                                   placeholder="Cari karyawan..." 
                                   class="pl-10 pr-4 py-2.5 border border-gray-300 dark:border-gray-600 rounded-lg text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-500 dark:placeholder-gray-400 focus:ring-2 focus:ring-blue-500 focus:border-transparent transition-colors duration-200 w-full sm:w-64">
                        </div>

                        <!-- Export Button -->
                        <a href="{{ route('karyawans.export') }}" 
                           class="inline-flex items-center justify-center px-4 py-2.5 text-sm font-medium text-white bg-green-600 hover:bg-green-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-green-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                            </svg>
                            <span>Export Excel</span>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="overflow-x-auto">
                <table class="min-w-full" id="employeeTable">
                    <thead class="bg-gray-50 dark:bg-gray-700/50 border-b border-gray-200 dark:border-gray-600">
                        <tr>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Karyawan
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Alamat
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                No. Telepon
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Berat Masuk
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Berat Keluar
                            </th>
                            <th class="px-6 py-4 text-left text-xs font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white dark:bg-gray-800 divide-y divide-gray-200 dark:divide-gray-700">
                        @forelse($karyawans as $index => $karyawan)
                            <tr class="hover:bg-gray-50 dark:hover:bg-gray-700/50 employee-row transition-colors duration-150">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-gradient-to-br from-blue-500 to-blue-600 flex items-center justify-center shadow-sm">
                                                <span class="text-sm font-semibold text-white">
                                                    {{ strtoupper(substr($karyawan->nama, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900 dark:text-white employee-name">{{ $karyawan->nama }}</div>
                                            <div class="text-xs text-gray-500 dark:text-gray-400">ID: {{ $karyawan->id_karyawan }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300" title="{{ $karyawan->alamat }}">
                                        {{ Str::limit($karyawan->alamat, 40) }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900 dark:text-gray-300 flex items-center">
                                        <svg class="w-4 h-4 mr-2 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path>
                                        </svg>
                                        {{ $karyawan->no_telp }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($karyawan->memuat_timbangan_in > 0)
                                            <div class="flex items-center text-sm text-green-700 dark:text-green-400">
                                                <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                                                {{ number_format($karyawan->memuat_timbangan_in, 0, ',', '.') }} <span class="text-xs ml-1">Kg</span>
                                            </div>
                                        @else
                                            <span class="text-sm text-gray-400 dark:text-gray-500">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        @if($karyawan->memuat_timbangan_out > 0)
                                            <div class="flex items-center text-sm text-orange-700 dark:text-orange-400">
                                                <div class="w-2 h-2 bg-orange-500 rounded-full mr-2"></div>
                                                {{ number_format($karyawan->memuat_timbangan_out, 0, ',', '.') }} <span class="text-xs ml-1">Kg</span>
                                            </div>
                                        @else
                                            <span class="text-sm text-gray-400 dark:text-gray-500">-</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <div class="flex items-center space-x-2">
                                        <a href="{{ route('karyawans.show', $karyawan->id_karyawan) }}" 
                                           class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-indigo-700 dark:text-indigo-300 bg-indigo-50 dark:bg-indigo-900/20 border border-indigo-200 dark:border-indigo-800 rounded-md hover:bg-indigo-100 dark:hover:bg-indigo-900/30 transition-colors duration-150">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"></path>
                                            </svg>
                                            View
                                        </a>
                                        <a href="{{ route('karyawans.edit', $karyawan->id_karyawan) }}" 
                                           class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-blue-700 dark:text-blue-300 bg-blue-50 dark:bg-blue-900/20 border border-blue-200 dark:border-blue-800 rounded-md hover:bg-blue-100 dark:hover:bg-blue-900/30 transition-colors duration-150">
                                            <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"></path>
                                            </svg>
                                            Edit
                                        </a>
                                        <form action="{{ route('karyawans.destroy', $karyawan->id_karyawan) }}" method="POST" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" 
                                                    class="inline-flex items-center px-2.5 py-1.5 text-xs font-medium text-red-700 dark:text-red-300 bg-red-50 dark:bg-red-900/20 border border-red-200 dark:border-red-800 rounded-md hover:bg-red-100 dark:hover:bg-red-900/30 transition-colors duration-150">
                                                <svg class="w-3 h-3 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                                </svg>
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-16 text-center">
                                    <div class="flex flex-col items-center">
                                        <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                            <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                            </svg>
                                        </div>
                                        <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Belum ada karyawan</h3>
                                        <p class="text-gray-500 dark:text-gray-400 mb-6 text-center max-w-sm">Mulai dengan menambahkan karyawan pertama untuk mengelola data perusahaan rotan Anda.</p>
                                        <a href="{{ route('karyawans.create') }}" 
                                           class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 rounded-lg transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800">
                                            <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                                            </svg>
                                            Tambah Karyawan
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            @if($karyawans->hasPages())
                <div class="px-6 py-4 border-t border-gray-200 dark:border-gray-700 bg-gray-50 dark:bg-gray-700/25">
                    <div class="flex items-center justify-between">
                        <div class="text-sm text-gray-700 dark:text-gray-300">
                            Menampilkan {{ $karyawans->firstItem() ?? 0 }} sampai {{ $karyawans->lastItem() ?? 0 }} dari {{ $karyawans->total() }} karyawan
                        </div>
                        <div class="pagination-wrapper">
                            {{ $karyawans->links() }}
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>

    <!-- Enhanced JavaScript for Search and UX -->
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
                                row.style.animation = 'fadeIn 0.3s ease-in';
                            } else {
                                row.style.display = 'none';
                            }
                        });

                        updateNoResultsMessage(visibleCount, searchTerm);
                    }, 300);
                });
            }

            // Add search results counter
            function updateNoResultsMessage(count, searchTerm) {
                let noResultsRow = document.getElementById('no-search-results');
                
                if (count === 0 && searchTerm) {
                    if (!noResultsRow) {
                        noResultsRow = document.createElement('tr');
                        noResultsRow.id = 'no-search-results';
                        noResultsRow.innerHTML = `
                            <td colspan="6" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center">
                                    <div class="w-16 h-16 bg-gray-100 dark:bg-gray-700 rounded-full flex items-center justify-center mb-4">
                                        <svg class="w-8 h-8 text-gray-400 dark:text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                        </svg>
                                    </div>
                                    <h3 class="text-lg font-medium text-gray-900 dark:text-white mb-2">Tidak ditemukan</h3>
                                    <p class="text-gray-500 dark:text-gray-400 text-center max-w-sm">
                                        Tidak ada karyawan yang sesuai dengan pencarian "<span class="font-medium">${searchTerm}</span>".
                                        <br>Coba kata kunci lain.
                                    </p>
                                </div>
                            </td>
                        `;
                        const tbody = document.querySelector('#employeeTable tbody');
                        if (tbody) {
                            tbody.appendChild(noResultsRow);
                        }
                    }
                } else if (noResultsRow) {
                    noResultsRow.remove();
                }
            }

            // Add keyboard shortcut for search (Ctrl/Cmd + K)
            document.addEventListener('keydown', function(e) {
                if ((e.ctrlKey || e.metaKey) && e.key === 'k') {
                    e.preventDefault();
                    if (searchInput) {
                        searchInput.focus();
                        searchInput.select();
                    }
                }
            });

            // Add search clear button functionality
            if (searchInput) {
                const clearSearchBtn = document.createElement('button');
                clearSearchBtn.type = 'button';
                clearSearchBtn.innerHTML = `
                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                    </svg>
                `;
                clearSearchBtn.className = 'absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 hover:text-gray-600 dark:hover:text-gray-300 transition-colors duration-200';
                clearSearchBtn.style.display = 'none';
                
                searchInput.parentElement.appendChild(clearSearchBtn);
                
                searchInput.addEventListener('input', function() {
                    clearSearchBtn.style.display = this.value ? 'block' : 'none';
                });
                
                clearSearchBtn.addEventListener('click', function(e) {
                    e.preventDefault();
                    searchInput.value = '';
                    searchInput.dispatchEvent(new Event('input'));
                    searchInput.focus();
                });
            }

            // FIXED: Delete confirmation with proper event handling
            const deleteButtons = document.querySelectorAll('form[action*="destroy"] button[type="submit"]');
            deleteButtons.forEach(button => {
                button.removeAttribute('onclick');
                button.setAttribute('data-no-loading', 'true');
                
                button.addEventListener('click', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    
                    if (this.hasAttribute('data-confirming')) {
                        return false;
                    }
                    
                    this.setAttribute('data-confirming', 'true');
                    
                    const form = this.closest('form');
                    const employeeRow = this.closest('tr');
                    const employeeName = employeeRow?.querySelector('.employee-name')?.textContent || 'karyawan ini';
                    
                    const result = confirm(`⚠️ Konfirmasi Penghapusan\n\nApakah Anda yakin ingin menghapus karyawan "${employeeName}"?\n\n• Data karyawan akan dihapus permanen\n• Data terkait mungkin terpengaruh\n• Tindakan ini tidak dapat dibatalkan\n\nKlik OK untuk melanjutkan.`);
                    
                    if (result && form) {
                        this.disabled = true;
                        this.innerHTML = `
                            <svg class="animate-spin w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            Menghapus...
                        `;
                        form.submit();
                    } else {
                        this.removeAttribute('data-confirming');
                    }
                });
            });
        });
    </script>
</x-app-layout>