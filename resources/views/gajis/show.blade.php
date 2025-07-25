<x-app-layout>
    @section('title', 'Detail Gaji')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Detail Gaji</h2>
            <div class="space-x-2">
                <a href="{{ route('gajis.edit', $gaji) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">Edit</a>
                <a href="{{ route('gajis.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Karyawan</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $gaji->karyawan->nama ?? '-' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gaji Mingguan</label>
                    <p class="mt-1 text-sm text-gray-900">Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Gaji Bulanan</label>
                    <p class="mt-1 text-sm text-gray-900">Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Data Absensi</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $gaji->absensi->tanggal->format('d F Y') ?? '-' }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Data Timbangan</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $gaji->timbangan->tanggal->format('d F Y') ?? '-' }}</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>