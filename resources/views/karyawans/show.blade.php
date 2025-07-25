<x-app-layout>
    @section('title', 'Detail Karyawan')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Detail Karyawan</h2>
            <div class="space-x-2">
                <a href="{{ route('karyawans.edit', $karyawan) }}" class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700">Edit</a>
                <a href="{{ route('karyawans.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-medium text-gray-700">Nama</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $karyawan->nama }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">No Telepon</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $karyawan->no_telp }}</p>
                </div>
                <div class="md:col-span-2">
                    <label class="block text-sm font-medium text-gray-700">Alamat</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $karyawan->alamat }}</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Timbangan In</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $karyawan->memuat_timbangan_in }} Kg</p>
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700">Timbangan Out</label>
                    <p class="mt-1 text-sm text-gray-900">{{ $karyawan->memuat_timbangan_out }} Kg</p>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>