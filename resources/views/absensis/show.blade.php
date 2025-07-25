<x-app-layout>
    @section('title', 'Detail Absensi')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Detail Absensi</h2>
            <div class="space-x-2">
                <a href="{{ route('absensis.edit', $absensi) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">Edit</a>
                <a href="{{ route('absensis.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $absensi->tanggal->format('d F Y') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Karyawan</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $absensi->karyawan->nama ?? '-' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Status Kehadiran</label>
                    <div class="mt-1">
                        @if($absensi->hadir)
                            <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Hadir</span>
                        @elseif($absensi->izin)
                            <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Izin</span>
                        @else
                            <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Tidak Hadir</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>