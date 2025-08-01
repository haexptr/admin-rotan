<x-app-layout>
    @section('title', 'Tambah Absensi')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-primary">Tambah Absensi</h2>
            <a href="{{ route('absensis.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                Kembali
            </a>
        </div>

        <div class="card">
            <div class="p-6">
                <form action="{{ route('absensis.store') }}" method="POST" class="space-y-4">
                    @csrf
                    <div>
                        <label for="tanggal" class="block text-sm font-medium text-primary mb-1">Tanggal</label>
                        <input type="date" 
                               name="tanggal" 
                               id="tanggal" 
                               value="{{ old('tanggal', date('Y-m-d')) }}" 
                               class="form-input w-full px-3 py-2 border border-primary rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors" 
                               required>
                        @error('tanggal')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label for="id_karyawan" class="block text-sm font-medium text-primary mb-1">Karyawan</label>
                        <select name="id_karyawan" 
                                id="id_karyawan" 
                                class="form-select w-full px-3 py-2 border border-primary rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors" 
                                required>
                            <option value="">Pilih Karyawan</option>
                            @foreach($karyawans as $karyawan)
                                <option value="{{ $karyawan->id_karyawan }}" 
                                        {{ old('id_karyawan') == $karyawan->id_karyawan ? 'selected' : '' }}>
                                    {{ $karyawan->nama }}
                                </option>
                            @endforeach
                        </select>
                        @error('id_karyawan')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div>
                        <label class="block text-sm font-medium text-primary mb-2">Status Kehadiran</label>
                        <div class="space-y-2">
                            <label class="flex items-center cursor-pointer hover:bg-secondary rounded-lg p-2 transition-colors">
                                <input type="radio" 
                                       name="status" 
                                       value="hadir" 
                                       class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700" 
                                       {{ old('status') == 'hadir' ? 'checked' : '' }} 
                                       required>
                                <span class="ml-2 text-sm text-primary">✅ Hadir</span>
                            </label>
                            <label class="flex items-center cursor-pointer hover:bg-secondary rounded-lg p-2 transition-colors">
                                <input type="radio" 
                                       name="status" 
                                       value="tidak_hadir" 
                                       class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700" 
                                       {{ old('status') == 'tidak_hadir' ? 'checked' : '' }} 
                                       required>
                                <span class="ml-2 text-sm text-primary">❌ Tidak Hadir</span>
                            </label>
                            <label class="flex items-center cursor-pointer hover:bg-secondary rounded-lg p-2 transition-colors">
                                <input type="radio" 
                                       name="status" 
                                       value="izin" 
                                       class="h-4 w-4 text-blue-600 border-gray-300 focus:ring-blue-500 dark:border-gray-600 dark:bg-gray-700" 
                                       {{ old('status') == 'izin' ? 'checked' : '' }} 
                                       required>
                                <span class="ml-2 text-sm text-primary">⚠️ Izin</span>
                            </label>
                        </div>
                        @error('status')
                            <p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>
                        @enderror
                    </div>
                    
                    <div class="flex space-x-2 pt-4">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                            💾 Simpan
                        </button>
                        <a href="{{ route('absensis.index') }}" 
                           class="bg-gray-300 hover:bg-gray-400 dark:bg-gray-600 dark:hover:bg-gray-500 text-gray-700 dark:text-gray-200 px-4 py-2 rounded-lg transition-colors">
                            ❌ Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>