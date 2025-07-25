<x-app-layout>
    @section('title', 'Data Absensi')

    <div class="space-y-4">
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-gray-900">Data Absensi</h2>
            <a href="{{ route('absensis.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg text-sm hover:bg-blue-700">Tambah Absensi</a>
        </div>

        <div class="bg-white rounded-lg shadow-sm border border-gray-200 overflow-hidden">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">No</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Tanggal</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Karyawan</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Status</th>
                        <th class="px-4 py-3 text-left text-xs font-medium text-gray-500 uppercase">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-200">
                    @forelse($absensis as $absensi)
                        <tr>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $absensi->tanggal->format('d/m/Y') }}</td>
                            <td class="px-4 py-3 text-sm text-gray-900">{{ $absensi->karyawan->nama ?? '-' }}</td>
                            <td class="px-4 py-3 text-sm">
                                @if($absensi->hadir)
                                    <span class="px-2 py-1 text-xs font-medium bg-green-100 text-green-800 rounded-full">Hadir</span>
                                @elseif($absensi->izin)
                                    <span class="px-2 py-1 text-xs font-medium bg-yellow-100 text-yellow-800 rounded-full">Izin</span>
                                @else
                                    <span class="px-2 py-1 text-xs font-medium bg-red-100 text-red-800 rounded-full">Tidak Hadir</span>
                                @endif
                            </td>
                            <td class="px-4 py-3 text-sm space-x-2">
                                <a href="{{ route('absensis.show', $absensi) }}" class="text-blue-600 hover:text-blue-900">Lihat</a>
                                <a href="{{ route('absensis.edit', $absensi) }}" class="text-green-600 hover:text-green-900">Edit</a>
                                <form action="{{ route('absensis.destroy', $absensi) }}" method="POST" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900" onclick="return confirm('Yakin ingin hapus?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr><td colspan="5" class="px-4 py-8 text-center text-gray-500">Belum ada data absensi</td></tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        @if($absensis->hasPages())
            <div class="mt-4">{{ $absensis->links() }}</div>
        @endif
    </div>
</x-app-layout>