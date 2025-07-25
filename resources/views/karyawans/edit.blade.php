<x-app-layout>
    @section('title', 'Edit Karyawan')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Edit Karyawan</h2>
            <a href="{{ route('karyawans.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('karyawans.update', $karyawan) }}" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                    <input type="text" name="nama" id="nama" value="{{ old('nama', $karyawan->nama) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    @error('nama')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700 mb-1">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>{{ old('alamat', $karyawan->alamat) }}</textarea>
                    @error('alamat')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="no_telp" class="block text-sm font-medium text-gray-700 mb-1">No Telepon</label>
                    <input type="text" name="no_telp" id="no_telp" value="{{ old('no_telp', $karyawan->no_telp) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    @error('no_telp')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="memuat_timbangan_in" class="block text-sm font-medium text-gray-700 mb-1">Timbangan In (Kg)</label>
                        <input type="number" step="0.01" name="memuat_timbangan_in" id="memuat_timbangan_in" value="{{ old('memuat_timbangan_in', $karyawan->memuat_timbangan_in) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('memuat_timbangan_in')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="memuat_timbangan_out" class="block text-sm font-medium text-gray-700 mb-1">Timbangan Out (Kg)</label>
                        <input type="number" step="0.01" name="memuat_timbangan_out" id="memuat_timbangan_out" value="{{ old('memuat_timbangan_out', $karyawan->memuat_timbangan_out) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500">
                        @error('memuat_timbangan_out')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update</button>
                    <a href="{{ route('karyawans.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>