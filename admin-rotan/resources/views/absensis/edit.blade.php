<x-app-layout>
    @section('title', 'Edit Absensi')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Edit Absensi</h2>
            <a href="{{ route('absensis.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('absensis.update', $absensi) }}" method="POST" class="space-y-4">
                @csrf @method('PUT')
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $absensi->tanggal->format('Y-m-d')) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                    @error('tanggal')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label for="id_karyawan" class="block text-sm font-medium text-gray-700 mb-1">Karyawan</label>
                    <select name="id_karyawan" id="id_karyawan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                        <option value="">Pilih Karyawan</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id_karyawan }}" {{ old('id_karyawan', $absensi->id_karyawan) == $karyawan->id_karyawan ? 'selected' : '' }}>{{ $karyawan->nama }}</option>
                        @endforeach
                    </select>
                    @error('id_karyawan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div>
                    <label class="block text-sm font-medium text-gray-700 mb-2">Status Kehadiran</label>
                    <div class="space-y-2">
                        <label class="flex items-center">
                            <input type="radio" name="status" value="hadir" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('status', $currentStatus) == 'hadir' ? 'checked' : '' }} required>
                            <span class="ml-2 text-sm text-gray-700">Hadir</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="tidak_hadir" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('status', $currentStatus) == 'tidak_hadir' ? 'checked' : '' }} required>
                            <span class="ml-2 text-sm text-gray-700">Tidak Hadir</span>
                        </label>
                        <label class="flex items-center">
                            <input type="radio" name="status" value="izin" class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500" {{ old('status', $currentStatus) == 'izin' ? 'checked' : '' }} required>
                            <span class="ml-2 text-sm text-gray-700">Izin</span>
                        </label>
                    </div>
                    @error('status')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Update</button>
                    <a href="{{ route('absensis.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>