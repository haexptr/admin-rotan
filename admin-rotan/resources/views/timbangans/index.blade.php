<x-app-layout>
    @section('title', 'Data Timbangan')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Data Timbangan</h2>
            <a href="{{ route('timbangans.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Tambah Timbangan</a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Nama Penjual</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Karyawan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Deskripsi</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($timbangans as $timbangan)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $timbangan->tanggal->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $timbangan->nama_penjual }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $timbangan->karyawan->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ Str::limit($timbangan->deskripsi_timbangan, 30) }}</td>
                            <td class="px-4 py-3 text-sm space-x-2">
                                <a href="{{ route('timbangans.show', $timbangan) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                                <a href="{{ route('timbangans.edit', $timbangan) }}" class="text-green-600 hover:text-green-900">Edit</a>
                                <form action="{{ route('timbangans.destroy', $timbangan) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="6" class="px-4 py-8 text-center text-gray-500">Belum ada data timbangan</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($timbangans->hasPages())
            <div class="mt-4">{{ $timbangans->links() }}</div>
        @endif
    </div>
</x-app-layout>