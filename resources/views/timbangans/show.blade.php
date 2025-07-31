<x-app-layout>
    @section('title', 'Detail Timbangan')

    <div class="min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-light text-gray-900 dark:text-gray-100 tracking-tight">Detail Timbangan</h1>
                    <div class="w-12 h-0.5 bg-slate-600 dark:bg-slate-400 mt-2"></div>
                </div>
                <div class="flex gap-3">
                    <a href="{{ route('timbangans.edit', $timbangan) }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-white bg-slate-600 dark:bg-slate-700 rounded-lg hover:bg-slate-700 dark:hover:bg-slate-600 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                        </svg>
                        Edit
                    </a>
                    <a href="{{ route('timbangans.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            <!-- Detail Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                <div class="p-8">
                    <div class="grid gap-8">
                        <!-- Row 1 -->
                        <div class="grid md:grid-cols-2 gap-8">
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Tanggal</label>
                                <p class="text-lg text-gray-900 dark:text-gray-100">{{ $timbangan->tanggal->format('d F Y') }}</p>
                            </div>
                            <div class="space-y-2">
                                <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Nama Penjual</label>
                                <p class="text-lg text-gray-900 dark:text-gray-100">{{ $timbangan->nama_penjual }}</p>
                            </div>
                        </div>

                        <!-- Row 2 -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Karyawan</label>
                            <p class="text-lg text-gray-900 dark:text-gray-100">{{ $timbangan->karyawan->nama ?? '-' }}</p>
                        </div>

                        <!-- Row 3 -->
                        <div class="space-y-2">
                            <label class="block text-sm font-medium text-gray-500 dark:text-gray-400 uppercase tracking-wide">Deskripsi/Keterangan</label>
                            <p class="text-lg text-gray-900 dark:text-gray-100 leading-relaxed">{{ $timbangan->deskripsi_timbangan ?: 'Tidak ada keterangan' }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>