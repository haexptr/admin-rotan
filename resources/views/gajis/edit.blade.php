<x-app-layout>
    @section('title', 'Edit Gaji')

    <div class="space-y-4">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Edit Gaji</h2>
            <a href="{{ route('gajis.index') }}" 
               class="bg-gray-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-gray-700 transition-colors">
                Kembali
            </a>
        </div>

        <!-- Form Card -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 p-6">
            <form action="{{ route('gajis.update', $gaji) }}" method="POST" class="space-y-4">
                @csrf
                @method('PUT')

                <!-- Karyawan -->
                <div>
                    <label for="id_karyawan" class="block text-sm font-medium text-gray-700 mb-1">
                        Karyawan <span class="text-red-500">*</span>
                    </label>
                    <select name="id_karyawan" 
                            id="id_karyawan" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                            required>
                        <option value="">-- Pilih Karyawan --</option>
                        @foreach($karyawans as $karyawan)
                            <option value="{{ $karyawan->id_karyawan }}" 
                                    {{ old('id_karyawan', $gaji->id_karyawan) == $karyawan->id_karyawan ? 'selected' : '' }}>
                                {{ $karyawan->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_karyawan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Data Absensi -->
                <div>
                    <label for="id_absensi" class="block text-sm font-medium text-gray-700 mb-1">
                        Data Absensi <span class="text-red-500">*</span>
                    </label>
                    <select name="id_absensi" 
                            id="id_absensi" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                            required>
                        <option value="">-- Pilih Data Absensi --</option>
                        @foreach($absensis as $absensi)
                            <option value="{{ $absensi->id_absensi }}" 
                                    {{ old('id_absensi', $gaji->id_absensi) == $absensi->id_absensi ? 'selected' : '' }}>
                                {{ $absensi->karyawan->nama ?? 'Unknown' }} - {{ $absensi->tanggal->format('d/m/Y') }}
                                @if($absensi->hadir)
                                    (Hadir)
                                @elseif($absensi->izin)
                                    (Izin)
                                @else
                                    (Tidak Hadir)
                                @endif
                            </option>
                        @endforeach
                    </select>
                    @error('id_absensi')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Data Timbangan -->
                <div>
                    <label for="id_timbangan" class="block text-sm font-medium text-gray-700 mb-1">
                        Data Timbangan <span class="text-red-500">*</span>
                    </label>
                    <select name="id_timbangan" 
                            id="id_timbangan" 
                            class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                            required>
                        <option value="">-- Pilih Data Timbangan --</option>
                        @foreach($timbangans as $timbangan)
                            <option value="{{ $timbangan->id_timbangan }}" 
                                    {{ old('id_timbangan', $gaji->id_timbangan) == $timbangan->id_timbangan ? 'selected' : '' }}>
                                {{ $timbangan->karyawan->nama ?? 'Unknown' }} - {{ $timbangan->tanggal->format('d/m/Y') }} - {{ $timbangan->nama_penjual }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_timbangan')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Gaji Mingguan & Bulanan -->
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                    <!-- Gaji Mingguan -->
                    <div>
                        <label for="mingguan" class="block text-sm font-medium text-gray-700 mb-1">
                            Gaji Mingguan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500 text-sm">Rp</span>
                            <input type="number" 
                                   name="mingguan" 
                                   id="mingguan" 
                                   value="{{ old('mingguan', $gaji->mingguan) }}" 
                                   min="0"
                                   step="1000"
                                   class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                   placeholder="0"
                                   required>
                        </div>
                        @error('mingguan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    <!-- Gaji Bulanan -->
                    <div>
                        <label for="statistik_dalam_bulanan" class="block text-sm font-medium text-gray-700 mb-1">
                            Statistik Gaji Bulanan <span class="text-red-500">*</span>
                        </label>
                        <div class="relative">
                            <span class="absolute left-3 top-2 text-gray-500 text-sm">Rp</span>
                            <input type="number" 
                                   name="statistik_dalam_bulanan" 
                                   id="statistik_dalam_bulanan" 
                                   value="{{ old('statistik_dalam_bulanan', $gaji->statistik_dalam_bulanan) }}" 
                                   min="0"
                                   step="1000"
                                   class="w-full pl-8 pr-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition-colors" 
                                   placeholder="0"
                                   required>
                        </div>
                        @error('statistik_dalam_bulanan')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <!-- Info Card -->
                <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                    <div class="flex items-start">
                        <svg class="w-5 h-5 text-blue-600 mt-0.5 mr-2" fill="currentColor" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
                        </svg>
                        <div>
                            <h4 class="text-sm font-medium text-blue-800">Informasi</h4>
                            <p class="text-sm text-blue-700 mt-1">
                                Pastikan data absensi dan timbangan sesuai dengan karyawan yang dipilih. 
                                Gaji bulanan biasanya 4x gaji mingguan.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex items-center justify-between pt-4 border-t border-gray-200">
                    <div class="flex space-x-3">
                        <button type="submit" 
                                class="bg-blue-600 text-white px-6 py-2 rounded-lg hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2 transition-colors">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                            Update Gaji
                        </button>
                        <a href="{{ route('gajis.index') }}" 
                           class="bg-gray-300 text-gray-700 px-6 py-2 rounded-lg hover:bg-gray-400 focus:outline-none focus:ring-2 focus:ring-gray-500 focus:ring-offset-2 transition-colors">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                            </svg>
                            Batal
                        </a>
                    </div>

                    <!-- Delete Button -->
                    <form action="{{ route('gajis.destroy', $gaji) }}" 
                          method="POST" 
                          class="inline"
                          onsubmit="return confirm('Yakin ingin menghapus data gaji ini?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" 
                                class="bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2 transition-colors">
                            <svg class="w-4 h-4 inline mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                            </svg>
                            Hapus
                        </button>
                    </form>
                </div>
            </form>
        </div>
    </div>

    <!-- Auto-calculate Script -->
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const mingguanInput = document.getElementById('mingguan');
            const bulananInput = document.getElementById('statistik_dalam_bulanan');

            // Auto calculate bulanan from mingguan
            mingguanInput.addEventListener('input', function() {
                const mingguanValue = parseFloat(this.value) || 0;
                const bulananValue = mingguanValue * 4;
                bulananInput.value = bulananValue;
            });

            // Format number input
            function formatNumber(input) {
                input.addEventListener('blur', function() {
                    const value = parseFloat(this.value);
                    if (!isNaN(value)) {
                        this.value = Math.round(value);
                    }
                });
            }

            formatNumber(mingguanInput);
            formatNumber(bulananInput);
        });
    </script>
</x-app-layout>