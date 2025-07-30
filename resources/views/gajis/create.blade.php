<x-app-layout>
    @section('title', 'Tambah Gaji')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Tambah Gaji</h2>
            <a href="{{ route('gajis.index') }}" class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700">Kembali</a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('gajis.store') }}" method="POST" class="space-y-4">
                @csrf
                
                <!-- Karyawan -->
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

                <!-- Data Absensi -->
                <div>
                    <label for="id_absensi" class="block text-sm font-medium text-gray-700 mb-1">Data Absensi</label>
                    <select name="id_absensi" id="id_absensi" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                        <option value="">Pilih Data Absensi</option>
                        @foreach($absensis as $absensi)
                            <option value="{{ $absensi->id_absensi }}" {{ old('id_absensi') == $absensi->id_absensi ? 'selected' : '' }}>
                                {{ $absensi->karyawan->nama ?? 'Unknown' }} - {{ $absensi->tanggal->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_absensi')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <!-- Data Timbangan -->
                <div>
                    <label for="id_timbangan" class="block text-sm font-medium text-gray-700 mb-1">Data Timbangan</label>
                    <select name="id_timbangan" id="id_timbangan" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                        <option value="">Pilih Data Timbangan</option>
                        @foreach($timbangans as $timbangan)
                            <option value="{{ $timbangan->id_timbangan }}" {{ old('id_timbangan') == $timbangan->id_timbangan ? 'selected' : '' }}>
                                {{ $timbangan->karyawan->nama ?? 'Unknown' }} - {{ $timbangan->tanggal->format('d/m/Y') }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_timbangan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                </div>

                <!-- Gaji Mingguan & Bulanan -->
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label for="mingguan" class="block text-sm font-medium text-gray-700 mb-1">Gaji Mingguan (Rp)</label>
                        <input type="number" name="mingguan" id="mingguan" value="{{ old('mingguan', 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                        @error('mingguan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                    <div>
                        <label for="statistik_dalam_bulanan" class="block text-sm font-medium text-gray-700 mb-1">Gaji Bulanan (Rp)</label>
                        <input type="number" name="statistik_dalam_bulanan" id="statistik_dalam_bulanan" value="{{ old('statistik_dalam_bulanan', 0) }}" class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500" required>
                        @error('statistik_dalam_bulanan')<p class="mt-1 text-sm text-red-600">{{ $message }}</p>@enderror
                    </div>
                </div>

                <!-- Submit Buttons -->
                <div class="flex space-x-2">
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Simpan</button>
                    <a href="{{ route('gajis.index') }}" class="bg-gray-300 text-gray-700 px-4 py-2 rounded-lg hover:bg-gray-400">Batal</a>
                </div>
            </form>
        </div>
    </div>
</x-app-layout>