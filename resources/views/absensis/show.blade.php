<x-app-layout>
    @section('title', 'Detail Absensi')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-primary">Detail Absensi</h2>
            <div class="flex space-x-2">
                <a href="{{ route('absensis.edit', $absensi) }}" 
                   class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                    ✏️ Edit
                </a>
                <a href="{{ route('absensis.index') }}" 
                   class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                    ⬅️ Kembali
                </a>
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                <h3 class="text-lg font-medium text-primary">📋 Informasi Absensi</h3>
            </div>
            <div class="p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Basic Info -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-secondary">📅 Tanggal</label>
                            <p class="mt-1 text-sm text-primary font-semibold">{{ $absensi->tanggal->format('d F Y') }}</p>
                            <p class="text-xs text-muted">{{ $absensi->tanggal->translatedFormat('l') }}</p>
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-secondary">👤 Karyawan</label>
                            <p class="mt-1 text-sm text-primary font-semibold">{{ $absensi->karyawan->nama ?? '-' }}</p>
                            @if($absensi->karyawan)
                                <p class="text-xs text-muted">{{ $absensi->karyawan->no_telp ?? 'No telepon tidak tersedia' }}</p>
                            @endif
                        </div>
                        
                        <div>
                            <label class="block text-sm font-medium text-secondary">📊 Status Kehadiran</label>
                            <div class="mt-2">
                                @if($absensi->hadir)
                                    <span class="inline-flex items-center px-3 py-2 text-sm font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-lg">
                                        ✅ Hadir
                                    </span>
                                @elseif($absensi->izin)
                                    <span class="inline-flex items-center px-3 py-2 text-sm font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-lg">
                                        ⚠️ Izin
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-3 py-2 text-sm font-medium bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-lg">
                                        ❌ Tidak Hadir
                                    </span>
                                @endif
                            </div>
                        </div>
                    </div>

                    <!-- Meta Info -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-secondary">🔧 Tipe Input</label>
                            <div class="mt-2">
                                <span class="inline-flex items-center px-3 py-2 text-sm font-medium rounded-lg
                                    {{ ($absensi->is_auto_generated ?? false) ? 'bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200' : 'bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200' }}">
                                    {{ $absensi->batch_type_label ?? 'Manual' }}
                                </span>
                            </div>
                            @if($absensi->is_auto_generated ?? false)
                                <p class="text-xs text-muted mt-1">🤖 Data ini dibuat secara otomatis</p>
                            @endif
                        </div>

                        @if($absensi->batch_id)
                            <div>
                                <label class="block text-sm font-medium text-secondary">🆔 Batch ID</label>
                                <p class="mt-1 text-sm font-mono bg-gray-100 dark:bg-gray-800 text-gray-800 dark:text-gray-200 px-2 py-1 rounded border">
                                    {{ $absensi->batch_id }}
                                </p>
                            </div>
                        @endif
                        
                        <div>
                            <label class="block text-sm font-medium text-secondary">🕒 Waktu Input</label>
                            <p class="mt-1 text-sm text-primary">{{ $absensi->created_at->format('d/m/Y H:i:s') }}</p>
                            <p class="text-xs text-muted">{{ $absensi->created_at->diffForHumans() }}</p>
                        </div>
                        
                        @if($absensi->updated_at != $absensi->created_at)
                            <div>
                                <label class="block text-sm font-medium text-secondary">📝 Terakhir Diupdate</label>
                                <p class="mt-1 text-sm text-primary">{{ $absensi->updated_at->format('d/m/Y H:i:s') }}</p>
                                <p class="text-xs text-muted">{{ $absensi->updated_at->diffForHumans() }}</p>
                            </div>
                        @endif
                    </div>
                </div>

                <!-- Additional Actions -->
                <div class="mt-8 pt-6 border-t border-primary">
                    <div class="flex flex-wrap gap-2">
                        <a href="{{ route('absensis.edit', $absensi) }}" 
                           class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            ✏️ Edit Data
                        </a>
                        
                        <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" class="inline">
                            @csrf @method('DELETE')
                            <button type="submit" 
                                    class="bg-red-600 hover:bg-red-700 dark:bg-red-500 dark:hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm transition-colors" 
                                    onclick="return confirm('⚠️ Yakin ingin hapus data absensi ini?\n\nTindakan ini tidak dapat dibatalkan.')">
                                🗑️ Hapus
                            </button>
                        </form>
                        
                        <a href="{{ route('absensis.bulk', ['date' => $absensi->tanggal->format('Y-m-d')]) }}" 
                           class="bg-purple-600 hover:bg-purple-700 dark:bg-purple-500 dark:hover:bg-purple-600 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                            👥 Lihat Absensi Hari Ini
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>