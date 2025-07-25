<x-app-layout>
    @section('title', 'Tambah Timbangan')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Tambah Timbangan</h2>
            <a href="{{ route('timbangans.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('timbangans.store') }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', date('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    @error('tanggal')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="nama_penjual" class="block text-sm font-medium text-gray-700 mb-1">Nama Penjual</label>
                    <input type="text" name="nama_penjual" id="nama_penjual" value="{{ old('nama_penjual') }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    @error('nama_penjual')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="id_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Karyawan</label>
                    <select name="id_karyawan" id="id_karyawan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id_karyawan }}" {{ old('id_karyawan') == $karyawan->id_karyawan ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_karyawan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="deskripsi_timbangan" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi/Keterangan</label>
                    <textarea name="deskripsi_timbangan" id="deskripsi_timbangan" rows="3" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500">{{ old('deskripsi_timbangan') }}</textarea>
                    @error('deskripsi_timbangan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('timbangans.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>