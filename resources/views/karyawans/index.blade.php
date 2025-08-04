<x-app-layout>
    @section('title', 'Employee Overview')

    <div class="min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-light text-gray-900 dark:text-gray-100 tracking-tight">Employee Overview</h1>
                    <div class="w-12 h-0.5 bg-slate-600 dark:bg-slate-400 mt-2"></div>
                </div>
                <div class="flex items-center gap-3">
                    <!-- Export Button -->
                    <a href="{{ route('karyawans.export') }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-green-600 dark:text-green-400 bg-white dark:bg-gray-800 border border-green-200 dark:border-green-800 rounded-lg hover:bg-green-50 dark:hover:bg-green-900/20 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                        </svg>
                        Export Excel
                    </a>

                    <a href="{{ route('karyawans.create') }}" 
                       class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-slate-800 dark:bg-slate-700 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Karyawan
                    </a>
                </div>
            </div>

            <!-- Stats Cards - AUTO LAYOUT SEPERTI DASHBOARD -->
            <div class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-4 gap-6 mb-8">
                <!-- Total Employees -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-blue-100 dark:bg-blue-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['total_employees'] ?? 0 }}</div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total Karyawan</p>
                    </div>
                </div>

                <!-- Active Employees -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-green-100 dark:bg-green-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ $stats['active_employees'] ?? 0 }}</div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Karyawan Aktif</p>
                    </div>
                </div>

                <!-- Total Weight In -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-purple-100 dark:bg-purple-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_weight_in'] ?? 0, 0, ',', '.') }}</div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total Berat Masuk (Kg)</p>
                    </div>
                </div>

                <!-- Total Weight Out -->
                <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm p-6">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center space-x-3">
                            <div class="p-3 bg-orange-100 dark:bg-orange-900/30 rounded-xl">
                                <svg class="w-6 h-6 text-orange-600 dark:text-orange-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3"></path>
                                </svg>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4">
                        <div class="text-2xl font-bold text-gray-900 dark:text-white">{{ number_format($stats['total_weight_out'] ?? 0, 0, ',', '.') }}</div>
                        <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Total Berat Keluar (Kg)</p>
                    </div>
                </div>
            </div>

            <!-- Success Message -->
            @if(session('karyawan_success'))
                <div class="bg-green-50 dark:bg-green-900/20 border border-green-200 dark:border-green-800 text-green-700 dark:text-green-200 px-4 py-3 rounded-lg flex items-center space-x-2 transition-colors duration-200 mb-6">
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

            <!-- Table Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                <!-- Search Header -->
                <div class="p-6 border-b border-gray-100 dark:border-gray-700">
                    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
                        <div>
                            <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Data Karyawan</h2>
                            <p class="text-sm text-gray-500 dark:text-gray-400 mt-1">Kelola informasi karyawan perusahaan</p>
                        </div>
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
                                   class="pl-10 pr-4 py-2.5 border border-gray-200 dark:border-gray-600 rounded-lg text-sm bg-white dark:bg-gray-700 text-gray-900 dark:text-white placeholder-gray-400 dark:placeholder-gray-500 focus:ring-2 focus:ring-slate-500 focus:border-transparent transition-colors duration-200 w-full sm:w-64">
                        </div>
                    </div>
                </div>

                <div>
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Karyawan</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Alamat</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">No. Telepon</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Berat Masuk</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Berat Keluar</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                            @forelse($karyawans ?? [] as $index => $karyawan)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150 employee-row">
                                    <td class="py-4 px-6">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-10 w-10">
                                                <div class="h-10 w-10 rounded-full bg-gradient-to-br from-slate-500 to-slate-600 flex items-center justify-center shadow-sm">
                                                    <span class="text-sm font-semibold text-white">
                                                        {{ strtoupper(substr($karyawan->nama ?? 'N/A', 0, 2)) }}
                                                    </span>
                                                </div>
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900 dark:text-white employee-name">{{ $karyawan->nama ?? 'N/A' }}</div>
                                                <div class="text-xs text-gray-500 dark:text-gray-400">ID: {{ $karyawan->id_karyawan ?? 'N/A' }}</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">{{ Str::limit($karyawan->alamat ?? 'N/A', 40) }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">{{ $karyawan->no_telp ?? 'N/A' }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">
                                        @if(($karyawan->memuat_timbangan_in ?? 0) > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 dark:bg-green-900/30 text-green-800 dark:text-green-300">
                                                {{ number_format($karyawan->memuat_timbangan_in, 0, ',', '.') }} Kg
                                            </span>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">
                                        @if(($karyawan->memuat_timbangan_out ?? 0) > 0)
                                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-orange-100 dark:bg-orange-900/30 text-orange-800 dark:text-orange-300">
                                                {{ number_format($karyawan->memuat_timbangan_out, 0, ',', '.') }} Kg
                                            </span>
                                        @else
                                            <span class="text-gray-400 dark:text-gray-500">-</span>
                                        @endif
                                    </td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('karyawans.show', $karyawan->id_karyawan ?? '') }}" 
                                               class="text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-300 text-sm font-medium transition-colors duration-150">Lihat</a>
                                            <a href="{{ route('karyawans.edit', $karyawan->id_karyawan ?? '') }}" 
                                               class="text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 text-sm font-medium transition-colors duration-150">Edit</a>
                                            <form action="{{ route('karyawans.destroy', $karyawan->id_karyawan ?? '') }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" 
                                                        class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 text-sm font-medium transition-colors duration-150">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-12">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 515.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                                        </svg>
                                        <h3 class="mt-4 text-sm font-medium text-gray-900 dark:text-gray-100">Belum ada karyawan</h3>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Mulai dengan menambahkan karyawan pertama Anda.</p>
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
        });
    </script>

    <!-- CSS untuk menghilangkan scrollbar -->
    <style>
        /* Menghilangkan scrollbar horizontal */
        body {
            overflow-x: hidden;
        }
        
        /* Menghilangkan scrollbar pada semua elemen */
        * {
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none;  /* Internet Explorer 10+ */
        }
        
        /* Menghilangkan scrollbar pada WebKit browsers (Chrome, Safari, Edge) */
        *::-webkit-scrollbar {
            display: none;
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
    </style>
</x-app-layout>