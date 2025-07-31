<x-app-layout>
    @section('title', 'Data Timbangan')

    <div class="min-h-screen p-6 bg-gray-50 dark:bg-gray-900" x-data="bulkDeleteManager()">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-light text-gray-900 dark:text-gray-100 tracking-tight">Data Timbangan</h1>
                    <div class="w-12 h-0.5 bg-slate-600 dark:bg-slate-400 mt-2"></div>
                </div>
                <div class="flex items-center gap-3">
                    <!-- Bulk Delete Dropdown -->
                    <div class="relative" x-data="{ open: false }">
                        <button @click="open = !open" 
                                type="button" 
                                class="inline-flex items-center px-4 py-2 text-sm font-medium text-red-600 dark:text-red-400 bg-white dark:bg-gray-800 border border-red-200 dark:border-red-800 rounded-lg hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-200">
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
                             class="absolute right-0 z-10 mt-2 w-56 bg-white dark:bg-gray-800 rounded-lg shadow-lg border border-gray-200 dark:border-gray-700">
                            <div class="py-2">
                                <button @click="confirmDelete('1_month')" 
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-3 text-orange-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Hapus Data 1 Bulan Terakhir
                                    </div>
                                </button>
                                <button @click="confirmDelete('3_months')" 
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-3 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Hapus Data 3 Bulan Terakhir
                                    </div>
                                </button>
                                <button @click="confirmDelete('6_months')" 
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-3 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Hapus Data 6 Bulan Terakhir
                                    </div>
                                </button>
                                <button @click="confirmDelete('12_months')" 
                                        class="w-full text-left px-4 py-2 text-sm text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <div class="flex items-center">
                                        <svg class="w-4 h-4 mr-3 text-red-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                        </svg>
                                        Hapus Data 12 Bulan Terakhir
                                    </div>
                                </button>
                                <hr class="my-2 border-gray-200 dark:border-gray-600">
                                <button @click="confirmDelete('all')" 
                                        class="w-full text-left px-4 py-2 text-sm text-red-600 dark:text-red-400 hover:bg-red-50 dark:hover:bg-red-900/20 transition-colors duration-150">
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

                    <a href="{{ route('timbangans.create') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-slate-800 dark:bg-slate-700 rounded-lg hover:bg-slate-900 dark:hover:bg-slate-600 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6"></path>
                        </svg>
                        Tambah Timbangan
                    </a>
                </div>
            </div>

            <!-- Table Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead>
                            <tr class="border-b border-gray-100 dark:border-gray-700">
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">No</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Tanggal</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Nama Penjual</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Karyawan</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Deskripsi</th>
                                <th class="text-left py-4 px-6 text-xs font-semibold text-gray-500 dark:text-gray-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-50 dark:divide-gray-700">
                            @forelse($timbangans as $timbangan)
                                <tr class="hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-150">
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">{{ $loop->iteration }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">{{ $timbangan->tanggal->format('d/m/Y') }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">{{ $timbangan->nama_penjual }}</td>
                                    <td class="py-4 px-6 text-sm text-gray-900 dark:text-gray-100">
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
                                    <td class="py-4 px-6 text-sm text-gray-500 dark:text-gray-400">{{ Str::limit($timbangan->deskripsi_timbangan, 30) }}</td>
                                    <td class="py-4 px-6">
                                        <div class="flex items-center gap-3">
                                            <a href="{{ route('timbangans.show', $timbangan) }}" class="text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-300 text-sm font-medium transition-colors duration-150">Lihat</a>
                                            <a href="{{ route('timbangans.edit', $timbangan) }}" class="text-amber-600 dark:text-amber-400 hover:text-amber-800 dark:hover:text-amber-300 text-sm font-medium transition-colors duration-150">Edit</a>
                                            <form action="{{ route('timbangans.destroy', $timbangan) }}" method="POST" class="inline">
                                                @csrf @method('DELETE')
                                                <button type="submit" class="text-red-600 dark:text-red-400 hover:text-red-800 dark:hover:text-red-300 text-sm font-medium transition-colors duration-150" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-12">
                                        <svg class="mx-auto h-12 w-12 text-gray-300 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1" d="M9 5H7a2 2 0 00-2 2v10a2 2 0 002 2h8a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"></path>
                                        </svg>
                                        <h3 class="mt-4 text-sm font-medium text-gray-900 dark:text-gray-100">Belum ada data timbangan</h3>
                                        <p class="mt-2 text-sm text-gray-500 dark:text-gray-400">Mulai dengan menambahkan data timbangan pertama Anda.</p>
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
        </div>

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
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity"></div>

                <div class="inline-block align-bottom bg-white dark:bg-gray-800 rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <div class="bg-white dark:bg-gray-800 px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                        <div class="sm:flex sm:items-start">
                            <div class="mx-auto flex-shrink-0 flex items-center justify-center h-12 w-12 rounded-full bg-red-100 dark:bg-red-900/20 sm:mx-0 sm:h-10 sm:w-10">
                                <svg class="h-6 w-6 text-red-600 dark:text-red-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                                </svg>
                            </div>
                            <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left">
                                <h3 class="text-lg leading-6 font-medium text-gray-900 dark:text-gray-100">
                                    Konfirmasi Hapus Data
                                </h3>
                                <div class="mt-2">
                                    <p class="text-sm text-gray-500 dark:text-gray-400" x-text="modalMessage"></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="bg-gray-50 dark:bg-gray-700 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                        <button @click="executeDelete()" 
                                type="button" 
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-red-600 text-base font-medium text-white hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
                            Ya, Hapus Data
                        </button>
                        <button @click="showModal = false" 
                                type="button" 
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 dark:border-gray-600 shadow-sm px-4 py-2 bg-white dark:bg-gray-800 text-base font-medium text-gray-700 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-slate-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm transition-colors duration-200">
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
    </script>
</x-app-layout>