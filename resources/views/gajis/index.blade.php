<x-app-layout>
    @section('title', 'Data Gaji')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Data Gaji</h2>
            <a href="{{ route('gajis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Tambah Gaji</a>
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