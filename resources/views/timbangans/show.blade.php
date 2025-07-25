<x-app-layout>
    @section('title', 'Detail Timbangan')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Detail Timbangan</h2>
            <div class="space-x-2">
                <a href="{{ route('timbangans.edit', $timbangan) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">Edit</a>
                <a href="{{ route('timbangans.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Tanggal</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $timbangan->tanggal->format('d F Y') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama Penjual</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $timbangan->nama_penjual }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Karyawan</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $timbangan->karyawan->nama ?? '-' }}</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Deskripsi/Keterangan</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $timbangan->deskripsi_timbangan ?: 'Tidak ada keterangan' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>