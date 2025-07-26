<x-app-layout>
    @section('title', 'Data Gaji')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Data Gaji</h2>
            <div class="flex space-x-2">
                <a href="{{ route('gajis.export') }}" 
                   class="bg-green-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-green-700 flex items-center">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"></path>
                    </svg>
                    Export Excel
                </a>
                <a href="{{ route('gajis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Tambah Gaji</a>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Karyawan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gaji Mingguan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Gaji Bulanan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($gajis as $gaji)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $gaji->karyawan->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">Rp {{ number_format($gaji->mingguan, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">Rp {{ number_format($gaji->statistik_dalam_bulanan, 0, ',', '.') }}</td>
                            <td class="px-4 py-3 text-sm space-x-2">
                                <a href="{{ route('gajis.show', $gaji) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                                <a href="{{ route('gajis.edit', $gaji) }}" class="text-green-600 hover:text-green-900">Edit</a>
                                <form action="{{ route('gajis.destroy', $gaji) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada data gaji</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($gajis->hasPages())
            <div class="mt-4">{{ $gajis->links() }}</div>
        @endif
    </div>
</x-app-layout>