<x-app-layout>
    @section('title', 'Data Karyawan')

    <div class="space-y-4">
        <!-- Header -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Data Karyawan</h2>
            <div class="flex space-x-2">
                <a href="{{ route('karyawans.export') }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>
                <a href="{{ route('karyawans.create') }}" 
                   class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">
                    Tambah Karyawan
                </a>
            </div>
        </div>

        <!-- Table -->
        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Alamat</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No Telp</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Timbangan In</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Timbangan Out</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($karyawans as $index => $karyawan)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $index + 1 }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $karyawan->nama }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ Str::limit($karyawan->alamat, 30) }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $karyawan->no_telp }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $karyawan->memuat_timbangan_in }} Kg</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $karyawan->memuat_timbangan_out }} Kg</td>
                            <td class="px-4 py-3 text-sm space-x-2">
                                <a href="{{ route('karyawans.show', $karyawan) }}" 
                                   class="text-blue-600 hover:text-blue-900">Lihat</a>
                                <a href="{{ route('karyawans.edit', $karyawan) }}" 
                                   class="text-green-600 hover:text-green-900">Edit</a>
                                <form action="{{ route('karyawans.destroy', $karyawan) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                            class="text-red-600 hover:text-red-900"
                                            onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="px-4 py-8 text-center text-gray-500">
                                Belum ada data karyawan
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        @if($karyawans->hasPages())
            <div class="mt-4">
                {{ $karyawans->links() }}
            </div>
        @endif
    </div>
</x-app-layout>