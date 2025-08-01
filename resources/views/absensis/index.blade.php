<x-app-layout>
    @section('title', 'Data Absensi')

    <div class="space-y-4">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-primary">Data Absensi</h2>
            <div class="flex space-x-2">
                {{-- Bulk Attendance Button - Purple theme --}}
                <a href="{{ route('absensis.bulk') }}" 
                   class="bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm flex items-center transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                    </svg>
                    Absensi Harian
                </a>
                
                <a href="{{ route('absensis.export') }}" 
                   class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm flex items-center transition-colors">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>
                
                <a href="{{ route('absensis.create') }}" 
                   class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                    Tambah Absensi
                </a>
            </div>
        </div>

        <!-- Table Card -->
        <div class="card">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y border-primary">
                    <thead class="bg-secondary">
                        <tr>
                            <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">No</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">Tanggal</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">Karyawan</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">Status</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">Tipe Input</th>
                            <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase tracking-wider">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="bg-primary divide-y border-primary">
                        @forelse($absensis as $absensi)
                            <tr class="hover:bg-secondary transition-colors">
                                <td class="px-4 py-3 text-sm text-primary">{{ $loop->iteration }}</td>
                                <td class="px-4 py-3 text-sm text-primary">{{ $absensi->tanggal->format('d/m/Y') }}</td>
                                <td class="px-4 py-3 text-sm text-primary">{{ $absensi->karyawan->nama ?? '-' }}</td>
                                <td class="px-4 py-3 text-sm">
                                    @if($absensi->hadir)
                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full">Hadir</span>
                                    @elseif($absensi->izin)
                                        <span class="px-2 py-1 text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full">Izin</span>
                                    @else
                                        <span class="px-2 py-1 text-xs font-medium bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full">Tidak Hadir</span>
                                    @endif
                                </td>
                                <td class="px-4 py-3 text-sm">
                                    <span class="px-2 py-1 text-xs font-medium rounded-full
                                        {{ ($absensi->is_auto_generated ?? false) ? 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                                        {{ $absensi->batch_type_label ?? 'Manual' }}
                                    </span>
                                </td>
                                <td class="px-4 py-3 text-sm space-x-2">
                                    <a href="{{ route('absensis.show', $absensi) }}" 
                                       class="text-blue-600 hover:text-blue-900 dark:text-blue-400 dark:hover:text-blue-300 transition-colors">
                                        Lihat
                                    </a>
                                    <a href="{{ route('absensis.edit', $absensi) }}" 
                                       class="text-green-600 hover:text-green-900 dark:text-green-400 dark:hover:text-green-300 transition-colors">
                                        Edit
                                    </a>
                                    <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" class="inline">
                                        @csrf @method('DELETE')
                                        <button type="submit" 
                                                class="text-red-600 hover:text-red-900 dark:text-red-400 dark:hover:text-red-300 transition-colors" 
                                                onclick="return confirm('⚠️ Yakin ingin hapus data absensi ini?\n\nTindakan ini tidak dapat dibatalkan.')">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-4 py-12 text-center text-muted">
                                    <div class="flex flex-col items-center space-y-3">
                                        <svg class="w-12 h-12 text-gray-400 dark:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                                        </svg>
                                        <div class="text-center">
                                            <h3 class="text-sm font-medium text-primary">Belum ada data absensi</h3>
                                            <p class="text-sm text-secondary mt-1">Mulai dengan menambah absensi baru atau gunakan fitur absensi harian</p>
                                        </div>
                                        <div class="flex space-x-2 mt-4">
                                            <a href="{{ route('absensis.bulk') }}" 
                                               class="bg-purple-600 hover:bg-purple-700 text-white px-3 py-2 rounded text-sm transition-colors">
                                                Absensi Harian
                                            </a>
                                            <a href="{{ route('absensis.create') }}" 
                                               class="bg-blue-600 hover:bg-blue-700 text-white px-3 py-2 rounded text-sm transition-colors">
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
        </div>

        <!-- Pagination -->
        @if($absensis->hasPages())
            <div class="mt-4">
                {{ $absensis->links() }}
            </div>
        @endif
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
</x-app-layout>