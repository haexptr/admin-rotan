<x-app-layout>
    @section('title', 'Absensi Harian')

    <div class="space-y-4">
        <!-- Header Section -->
        <div class="flex justify-between items-center">
            <h2 class="text-xl font-semibold text-primary">Absensi Harian - {{ $selectedDate->format('d F Y') }}</h2>
            <a href="{{ route('absensis.index') }}" 
               class="bg-gray-600 hover:bg-gray-700 dark:bg-gray-600 dark:hover:bg-gray-500 text-white px-4 py-2 rounded-lg text-sm transition-colors">
                ⬅️ Kembali
            </a>
        </div>

        <!-- Date Selection & Actions -->
        <div class="card">
            <div class="p-4">
                <div class="flex flex-col md:flex-row justify-between items-start md:items-center space-y-4 md:space-y-0">
                    <!-- Date Picker -->
                    <form method="GET" action="{{ route('absensis.bulk') }}" class="flex items-center space-x-2">
                        <input type="date" 
                               name="date" 
                               value="{{ $selectedDate->format('Y-m-d') }}" 
                               class="form-input px-3 py-2 border border-primary rounded-lg focus:outline-none focus:ring-1 focus:ring-blue-500 transition-colors">
                        <button type="submit" 
                                class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-4 py-2 rounded-lg transition-colors">
                            📅 Pilih Tanggal
                        </button>
                    </form>
                    
                    <!-- Action Buttons -->
                    <div class="flex space-x-2">
                        <form method="POST" action="{{ route('absensis.generate-daily') }}" class="inline">
                            @csrf
                            <input type="hidden" name="date" value="{{ $selectedDate->format('Y-m-d') }}">
                            <button type="submit" 
                                    class="bg-green-600 hover:bg-green-700 dark:bg-green-500 dark:hover:bg-green-600 text-white px-4 py-2 rounded-lg text-sm transition-colors"
                                    onclick="return confirm('🤖 Generate absensi otomatis untuk {{ $selectedDate->format('d/m/Y') }}?')">
                                ⚡ Generate Absensi
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Bulk Attendance Form -->
        <div class="card">
            <div class="card-header">
                <div class="flex items-center justify-between">
                    <h3 class="text-lg font-medium text-primary">
                        👥 Absensi Karyawan - {{ $selectedDate->format('d F Y') }}
                    </h3>
                    <span class="px-3 py-1 text-sm font-medium bg-blue-100 dark:bg-blue-900 text-blue-800 dark:text-blue-200 rounded-full">
                        {{ $attendanceData->count() }} Karyawan
                    </span>
                </div>
            </div>
            
            <div class="p-6">
                @if($attendanceData->count() > 0)
                    <form method="POST" action="{{ route('absensis.bulk.store') }}" id="bulkAttendanceForm">
                        @csrf
                        <input type="hidden" name="date" value="{{ $selectedDate->format('Y-m-d') }}">
                        
                        <!-- Quick Actions -->
                        <div class="mb-6 p-4 bg-secondary rounded-lg">
                            <h4 class="text-sm font-medium text-primary mb-3">⚡ Quick Actions:</h4>
                            <div class="flex flex-wrap gap-2">
                                <button type="button" 
                                        class="bg-green-600 hover:bg-green-700 text-white px-3 py-2 rounded text-sm transition-colors" 
                                        onclick="setAllStatus('hadir')">
                                    ✅ Semua Hadir
                                </button>
                                <button type="button" 
                                        class="bg-red-600 hover:bg-red-700 text-white px-3 py-2 rounded text-sm transition-colors" 
                                        onclick="setAllStatus('tidak_hadir')">
                                    ❌ Semua Tidak Hadir
                                </button>
                                <button type="button" 
                                        class="bg-yellow-600 hover:bg-yellow-700 text-white px-3 py-2 rounded text-sm transition-colors" 
                                        onclick="setAllStatus('izin')">
                                    ⚠️ Semua Izin
                                </button>
                            </div>
                        </div>

                        <!-- Attendance List -->
                        <div class="overflow-x-auto">
                            <table class="min-w-full divide-y border-primary">
                                <thead class="bg-secondary">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase">#</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase">Nama Karyawan</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase">No. Telepon</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase">Status Kehadiran</th>
                                        <th class="px-4 py-3 text-left text-xs font-medium text-secondary uppercase">Current</th>
                                    </tr>
                                </thead>
                                <tbody class="bg-primary divide-y border-primary">
                                    @foreach($attendanceData as $index => $data)
                                        <tr class="hover:bg-secondary transition-colors">
                                            <td class="px-4 py-3 text-sm text-primary font-medium">{{ $index + 1 }}</td>
                                            <td class="px-4 py-3">
                                                <div class="text-sm font-medium text-primary">{{ $data->karyawan->nama }}</div>
                                                <input type="hidden" 
                                                       name="attendance[{{ $index }}][id_karyawan]" 
                                                       value="{{ $data->karyawan->id_karyawan }}">
                                            </td>
                                            <td class="px-4 py-3 text-sm text-secondary">{{ $data->karyawan->no_telp }}</td>
                                            <td class="px-4 py-3">
                                                <div class="flex flex-wrap gap-2">
                                                    <label class="flex items-center cursor-pointer">
                                                        <input type="radio" 
                                                               name="attendance[{{ $index }}][status]" 
                                                               value="hadir"
                                                               class="sr-only"
                                                               {{ $data->status === 'hadir' ? 'checked' : '' }}>
                                                        <span class="px-3 py-1 text-xs rounded-full border-2 transition-colors {{ $data->status === 'hadir' ? 'bg-green-500 text-white border-green-500' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600 hover:border-green-400' }}">
                                                            ✅ Hadir
                                                        </span>
                                                    </label>
                                                    
                                                    <label class="flex items-center cursor-pointer">
                                                        <input type="radio" 
                                                               name="attendance[{{ $index }}][status]" 
                                                               value="tidak_hadir"
                                                               class="sr-only"
                                                               {{ $data->status === 'tidak_hadir' ? 'checked' : '' }}>
                                                        <span class="px-3 py-1 text-xs rounded-full border-2 transition-colors {{ $data->status === 'tidak_hadir' ? 'bg-red-500 text-white border-red-500' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600 hover:border-red-400' }}">
                                                            ❌ Tidak Hadir
                                                        </span>
                                                    </label>
                                                    
                                                    <label class="flex items-center cursor-pointer">
                                                        <input type="radio" 
                                                               name="attendance[{{ $index }}][status]" 
                                                               value="izin"
                                                               class="sr-only"
                                                               {{ $data->status === 'izin' ? 'checked' : '' }}>
                                                        <span class="px-3 py-1 text-xs rounded-full border-2 transition-colors {{ $data->status === 'izin' ? 'bg-yellow-500 text-white border-yellow-500' : 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600 hover:border-yellow-400' }}">
                                                            ⚠️ Izin
                                                        </span>
                                                    </label>
                                                </div>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                @if($data->attendance)
                                                    @if($data->attendance->hadir)
                                                        <span class="px-2 py-1 text-xs font-medium bg-green-100 dark:bg-green-900 text-green-800 dark:text-green-200 rounded-full">Hadir</span>
                                                    @elseif($data->attendance->tidak_hadir)
                                                        <span class="px-2 py-1 text-xs font-medium bg-red-100 dark:bg-red-900 text-red-800 dark:text-red-200 rounded-full">Tidak Hadir</span>
                                                    @elseif($data->attendance->izin)
                                                        <span class="px-2 py-1 text-xs font-medium bg-yellow-100 dark:bg-yellow-900 text-yellow-800 dark:text-yellow-200 rounded-full">Izin</span>
                                                    @endif
                                                    @if($data->attendance->is_auto_generated ?? false)
                                                        <div class="text-xs text-muted mt-1">🤖 Auto</div>
                                                    @endif
                                                @else
                                                    <span class="px-2 py-1 text-xs font-medium bg-gray-100 dark:bg-gray-700 text-gray-800 dark:text-gray-200 rounded-full">Belum Ada</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>

                        <!-- Submit Actions -->
                        <div class="mt-6 pt-4 border-t border-primary">
                            <div class="flex justify-end">
                                <button type="submit" 
                                        class="bg-blue-600 hover:bg-blue-700 dark:bg-blue-500 dark:hover:bg-blue-600 text-white px-6 py-3 rounded-lg font-medium transition-colors">
                                    💾 Simpan Absensi Harian
                                </button>
                            </div>
                        </div>
                    </form>
                @else
                    <div class="text-center py-12">
                        <div class="space-y-4">
                            <svg class="w-16 h-16 text-gray-400 dark:text-gray-600 mx-auto" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                            </svg>
                            <div>
                                <h3 class="text-lg font-medium text-primary">Belum Ada Data Karyawan</h3>
                                <p class="text-sm text-secondary mt-1">Silakan tambah karyawan terlebih dahulu untuk dapat menginput absensi</p>
                            </div>
                            <a href="{{ route('karyawans.create') }}" 
                               class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg inline-flex items-center transition-colors">
                                👤 Tambah Karyawan
                            </a>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

    <script>
    function setAllStatus(status) {
        const radios = document.querySelectorAll(`input[type="radio"][value="${status}"]`);
        radios.forEach(radio => {
            radio.checked = true;
            // Update visual state
            const label = radio.nextElementSibling;
            if (label) {
                // Remove active classes from all labels in this row
                const row = radio.closest('tr');
                const allLabels = row.querySelectorAll('label span');
                allLabels.forEach(span => {
                    span.className = span.className.replace(/bg-(green|red|yellow)-500 text-white border-(green|red|yellow)-500/, 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600');
                });
                
                // Add active class to selected label
                if (status === 'hadir') {
                    label.className = label.className.replace(/bg-gray-100.*?hover:border-green-400/, 'bg-green-500 text-white border-green-500');
                } else if (status === 'tidak_hadir') {
                    label.className = label.className.replace(/bg-gray-100.*?hover:border-red-400/, 'bg-red-500 text-white border-red-500');
                } else if (status === 'izin') {
                    label.className = label.className.replace(/bg-gray-100.*?hover:border-yellow-400/, 'bg-yellow-500 text-white border-yellow-500');
                }
            }
        });
    }

    // Form validation
    document.getElementById('bulkAttendanceForm')?.addEventListener('submit', function(e) {
        const attendanceInputs = document.querySelectorAll('input[name*="[status]"]:checked');
        if (attendanceInputs.length === 0) {
            e.preventDefault();
            alert('⚠️ Pilih minimal satu status kehadiran!');
            return false;
        }
        
        return confirm('💾 Simpan data absensi untuk {{ $selectedDate->format("d/m/Y") }}?\n\nTotal: ' + attendanceInputs.length + ' karyawan');
    });

    // Add visual feedback for radio button selection
    document.addEventListener('change', function(e) {
        if (e.target.type === 'radio' && e.target.name.includes('[status]')) {
            const row = e.target.closest('tr');
            const allLabels = row.querySelectorAll('label span');
            
            // Reset all labels in this row
            allLabels.forEach(span => {
                span.className = span.className.replace(/bg-(green|red|yellow)-500 text-white border-(green|red|yellow)-500/, 'bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 border-gray-300 dark:border-gray-600');
            });
            
            // Highlight selected label
            const selectedLabel = e.target.nextElementSibling;
            if (selectedLabel && e.target.value === 'hadir') {
                selectedLabel.className = 'px-3 py-1 text-xs rounded-full border-2 transition-colors bg-green-500 text-white border-green-500';
            } else if (selectedLabel && e.target.value === 'tidak_hadir') {
                selectedLabel.className = 'px-3 py-1 text-xs rounded-full border-2 transition-colors bg-red-500 text-white border-red-500';
            } else if (selectedLabel && e.target.value === 'izin') {
                selectedLabel.className = 'px-3 py-1 text-xs rounded-full border-2 transition-colors bg-yellow-500 text-white border-yellow-500';
            }
        }
    });
    </script>
</x-app-layout>