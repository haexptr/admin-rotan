<x-app-layout>
    @section('title', 'Data Timbangan')

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

        /* Timbangan page container - FULL WIDTH - Dark Theme */
        .timbangan-container {
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
        .btn-delete {
            color: #ef4444 !important;
            background: var(--color-black) !important;
            border-color: rgba(239, 68, 68, 0.3) !important;
        }

        .btn-delete:hover {
            background: rgba(239, 68, 68, 0.1) !important;
            border-color: rgba(239, 68, 68, 0.5) !important;
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

        /* Dropdown Dark Theme */
        .dropdown-menu {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
        }

        .dropdown-item {
            color: var(--color-light) !important;
        }

        .dropdown-item:hover {
            background: rgba(109, 109, 109, 0.2) !important;
            color: var(--color-white) !important;
        }

        .dropdown-item.danger {
            color: #ef4444 !important;
        }

        .dropdown-item.danger:hover {
            background: rgba(239, 68, 68, 0.1) !important;
        }

        .dropdown-divider {
            border-color: var(--color-gray) !important;
        }

        /* Table Card Dark Theme */
        .table-card {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.4) !important;
            transition: all 0.3s ease;
        }

        .table-card:hover {
            transform: translateY(-1px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.5) !important;
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

        /* Modal Dark Theme */
        .modal-overlay {
            background: rgba(36, 36, 36, 0.8) !important;
        }

        .modal-content {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6) !important;
        }

        .modal-header {
            color: var(--color-white) !important;
        }

        .modal-text {
            color: var(--color-light) !important;
        }

        .modal-icon-bg {
            background: rgba(239, 68, 68, 0.2) !important;
        }

        .modal-icon {
            color: #ef4444 !important;
        }

        .modal-footer {
            background: rgba(109, 109, 109, 0.1) !important;
        }

        .modal-btn-danger {
            background: #ef4444 !important;
            border-color: #ef4444 !important;
        }

        .modal-btn-danger:hover {
            background: #dc2626 !important;
        }

        .modal-btn-cancel {
            background: var(--color-black) !important;
            border: 1px solid var(--color-gray) !important;
            color: var(--color-light) !important;
        }

        .modal-btn-cancel:hover {
            background: rgba(109, 109, 109, 0.2) !important;
            color: var(--color-white) !important;
        }

        /* Color icons untuk dropdown items */
        .icon-orange { color: #f59e0b !important; }
        .icon-yellow { color: #eab308 !important; }
        .icon-red { color: #ef4444 !important; }
        .icon-red-dark { color: #dc2626 !important; }

        /* Responsive */
        @media (max-width: 1024px) {
            .timbangan-container {
                padding: 1rem;
            }
        }

        @media (max-width: 768px) {
            .timbangan-container {
                padding: 0.75rem;
            }
        }

        /* Animation */
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-card {
            animation: slideUp 0.8s ease-out;
        }

        /* Dropdown animation enhancement */
        .dropdown-menu {
            animation: slideUp 0.3s ease-out;
        }
    </style>

    <div class="timbangan-container" x-data="bulkDeleteManager()">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8 page-header">
            <div>
                <h1 class="text-2xl font-light tracking-tight">Data Timbangan</h1>
                <div class="w-12 h-0.5 mt-2 divider"></div>
            </div>
            <div class="flex items-center gap-3">
                <!-- Bulk Delete Dropdown -->
                <div class="relative" x-data="{ open: false }">
                    <button @click="open = !open" 
                            type="button" 
                            class="btn-delete inline-flex items-center px-4 py-2 text-sm font-medium border rounded-lg transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                        </svg>
                        Hapus Data Lama
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                        </svg>
                    </button>

                    <div x-show="open" 
                         @click.away="open = false"
                         x-transition:enter="transition ease-out duration-100"
                         x-transition:enter-start="transform opacity-0 scale-95"
                         x-transition:enter-end="transform opacity-100 scale-100"
                         x-transition:leave="transition ease-in duration-75"
                         x-transition:leave-start="transform opacity-100 scale-100"
                         x-transition:leave-end="transform opacity-0 scale-95"
                         class="dropdown-menu absolute right-0 z-10 mt-2 w-56 rounded-lg shadow-lg">
                        <div class="py-2">
                            <button @click="confirmDelete('1_month')" 
                                    class="dropdown-item w-full text-left px-4 py-2 text-sm transition-colors duration-150">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 icon-orange" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Hapus Data 1 Bulan Terakhir
                                </div>
                            </button>
                            <button @click="confirmDelete('3_months')" 
                                    class="dropdown-item w-full text-left px-4 py-2 text-sm transition-colors duration-150">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 icon-yellow" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Hapus Data 3 Bulan Terakhir
                                </div>
                            </button>
                            <button @click="confirmDelete('6_months')" 
                                    class="dropdown-item w-full text-left px-4 py-2 text-sm transition-colors duration-150">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 icon-red" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Hapus Data 6 Bulan Terakhir
                                </div>
                            </button>
                            <button @click="confirmDelete('12_months')" 
                                    class="dropdown-item w-full text-left px-4 py-2 text-sm transition-colors duration-150">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-3 icon-red-dark" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    Hapus Data 12 Bulan Terakhir
                                </div>
                            </button>
                            <hr class="dropdown-divider my-2 border-t">
                            <button @click="confirmDelete('all')" 
                                    class="dropdown-item danger w-full text-left px-4 py-2 text-sm transition-colors duration-150">
                                <div class="flex items-center">
                                    <svg class="w-4 h-4 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                    Hapus Semua Data
                                </div>
                            </button>
                        </div>
                    </div>
                </div>

                <a href="{{ route('timbangans.create') }}" class="btn-primary inline-flex items-center px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                    </svg>
                    Tambah Timbangan
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="table-card rounded-2xl">
            <div>
                <table class="w-full">
                    <thead>
                        <tr class="table-header-row">
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">No</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Tanggal</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Nama Penjual</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Karyawan</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Deskripsi</th>
                            <th class="text-left py-4 px-6 text-xs font-semibold uppercase tracking-wider table-header-cell">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-opacity-20">
                        @forelse($timbangans as $timbangan)
                            <tr class="table-row transition-colors duration-150">
                                <td class="py-4 px-6 text-sm table-cell">{{ $loop->iteration }}</td>
                                <td class="py-4 px-6 text-sm table-cell">{{ $timbangan->tanggal->format('d/m/Y') }}</td>
                                <td class="py-4 px-6 text-sm table-cell">{{ $timbangan->nama_penjual }}</td>
                                <td class="py-4 px-6 text-sm table-cell">
                                    @if($timbangan->karyawan)
                                        {{ $timbangan->karyawan->nama }}
                                    @elseif($timbangan->id_karyawan)
                                        <!-- If relationship fails, try to find the employee directly -->
                                        @php
                                            $karyawan = \App\Models\Karyawan::find($timbangan->id_karyawan);
                                        @endphp
                                        {{ $karyawan ? $karyawan->nama : 'Karyawan tidak ditemukan' }}
                                    @else
                                        -
                                    @endif
                                </td>
                                <td class="py-4 px-6 text-sm table-cell-secondary">{{ Str::limit($timbangan->deskripsi_timbangan, 30) }}</td>
                                <td class="py-4 px-6">
                                    <div class="flex items-center gap-3">
                                        <a href="{{ route('timbangans.show', $timbangan) }}" class="action-view text-sm font-medium transition-colors duration-150">Lihat</a>
                                        <a href="{{ route('timbangans.edit', $timbangan) }}" class="action-edit text-sm font-medium transition-colors duration-150">Edit</a>
                                        <form action="{{ route('timbangans.destroy', $timbangan) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="action-delete text-sm font-medium transition-colors duration-150" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-12">
                                    <svg class="mx-auto h-12 w-12 empty-state-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                    </svg>
                                    <h3 class="mt-4 text-sm font-medium empty-state-title">Belum ada data timbangan</h3>
                                    <p class="mt-2 text-sm empty-state-subtitle">Mulai dengan menambahkan data timbangan pertama Anda.</p>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Pagination -->
        @if($timbangans->hasPages())
            <div class="mt-6">
                {{ $timbangans->links() }}
            </div>
        @endif

        <!-- Confirmation Modal -->
        <div x-show="showModal" 
             x-transition:enter="transition ease-out duration-300"
             x-transition:enter-start="opacity-0"
             x-transition:enter-end="opacity-100"
             x-transition:leave="transition ease-in duration-200"
             x-transition:leave-start="opacity-100"
             x-transition:leave-end="opacity-0"
             class="fixed inset-0 z-50 overflow-y-auto" 
             style="display: none;">
            <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <div class="modal-overlay fixed inset-0 transition-opacity"></div>

                <div class="modal-content inline-block align-bottom rounded-lg text-left shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="modal-icon-bg mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 modal-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium modal-header">
                                    Konfirmasi Hapus Data
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm modal-text" x-text="modalMessage"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="executeDelete()" 
                                type="button" 
                                class="modal-btn-danger w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
                            Ya, Hapus Data
                        </button>
                        <button @click="showModal = false" 
                                type="button" 
                                class="modal-btn-cancel mt-3 w-full inline-flex justify-center rounded-md shadow-sm px-4 py-2 text-base font-medium focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
                            Batal
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Hidden Form for Bulk Delete -->
        <form x-ref="bulkDeleteForm" method="POST" style="display: none;">
            @csrf
            @method('DELETE')
        </form>
    </div>

    <script>
        function bulkDeleteManager() {
            return {
                showModal: false,
                deleteType: '',
                modalMessage: '',

                confirmDelete(type) {
                    this.deleteType = type;
                    this.showModal = true;
                    
                    const messages = {
                        '1_month': 'Apakah Anda yakin ingin menghapus semua data timbangan dari 1 bulan terakhir? Tindakan ini tidak dapat dibatalkan.',
                        '3_months': 'Apakah Anda yakin ingin menghapus semua data timbangan dari 3 bulan terakhir? Tindakan ini tidak dapat dibatalkan.',
                        '6_months': 'Apakah Anda yakin ingin menghapus semua data timbangan dari 6 bulan terakhir? Tindakan ini tidak dapat dibatalkan.',
                        '12_months': 'Apakah Anda yakin ingin menghapus semua data timbangan dari 12 bulan terakhir? Tindakan ini tidak dapat dibatalkan.',
                        'all': 'Apakah Anda yakin ingin menghapus SEMUA data timbangan? Tindakan ini akan menghapus seluruh riwayat data dan tidak dapat dibatalkan.'
                    };

                    this.modalMessage = messages[type];
                },

                executeDelete() {
                    const form = this.$refs.bulkDeleteForm;
                    form.action = `{{ route('timbangans.bulk-delete') }}?period=${this.deleteType}`;
                    form.submit();
                }
            }
        }

        document.addEventListener('DOMContentLoaded', function() {
            console.log('🌙 Timbangan Dark Theme Loaded Successfully!');
        });
    </script>
</x-app-layout>