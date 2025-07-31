<x-app-layout>
    @section('title', 'Edit Timbangan')

    <div class="min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="max-w-2xl mx-auto">
            <!-- Header -->
            <div class="flex items-center justify-between mb-8">
                <div>
                    <h1 class="text-2xl font-light text-gray-900 dark:text-gray-100 tracking-tight">Edit Timbangan</h1>
                    <div class="w-12 h-0.5 bg-slate-600 dark:bg-slate-400 mt-2"></div>
                </div>
                <a href="{{ route('timbangans.index') }}" class="inline-flex items-center px-4 py-2 text-sm font-medium text-gray-600 dark:text-gray-300 bg-white dark:bg-gray-800 border border-gray-200 dark:border-gray-700 rounded-lg hover:bg-gray-50 dark:hover:bg-gray-700 transition-colors duration-200">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                    </svg>
                    Kembali
                </a>
            </div>

            <!-- Form Card -->
            <div class="bg-white dark:bg-gray-800 rounded-2xl border border-gray-100 dark:border-gray-700 shadow-sm">
                <div class="p-8">
                    <form action="{{ route('timbangans.update', $timbangan) }}" method="POST" class="space-y-6">
                        @csrf @method('PUT')
                        
                        <!-- Date Field -->
                        <div class="space-y-2">
                            <label for="tanggal" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Tanggal</label>
                            <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal', $timbangan->tanggal->format('Y-m-d')) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-0 rounded-xl text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:bg-white dark:focus:bg-gray-600 focus:ring-2 focus:ring-slate-500 dark:focus:ring-slate-400 focus:ring-offset-0 transition-all duration-200" required>
                            @error('tanggal')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <!-- Seller Name Field -->
                        <div class="space-y-2">
                            <label for="nama_penjual" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Nama Penjual</label>
                            <input type="text" name="nama_penjual" id="nama_penjual" value="{{ old('nama_penjual', $timbangan->nama_penjual) }}" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-0 rounded-xl text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:bg-white dark:focus:bg-gray-600 focus:ring-2 focus:ring-slate-500 dark:focus:ring-slate-400 focus:ring-offset-0 transition-all duration-200" required>
                            @error('nama_penjual')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <!-- Multi-Select Employees with Search -->
                        <div class="space-y-2" x-data="employeeSelector()">
                            <label class="block text-sm font-medium text-gray-900 dark:text-gray-100">Karyawan</label>
                            <div class="relative">
                                <!-- Search Input -->
                                <div class="relative mb-3">
                                    <input type="text" 
                                           x-model="searchQuery" 
                                           @input="filterEmployees()" 
                                           placeholder="Cari karyawan..." 
                                           class="w-full px-4 py-3 pr-10 bg-gray-50 dark:bg-gray-700 border-0 rounded-xl text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 focus:bg-white dark:focus:bg-gray-600 focus:ring-2 focus:ring-slate-500 dark:focus:ring-slate-400 focus:ring-offset-0 transition-all duration-200">
                                    <svg class="absolute right-3 top-1/2 transform -translate-y-1/2 w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                    </svg>
                                </div>

                                <!-- Selected Employees Display -->
                                <div x-show="selectedEmployees.length > 0" class="mb-3">
                                    <div class="flex flex-wrap gap-2">
                                        <template x-for="employee in getSelectedEmployeeNames()" :key="employee.id">
                                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm bg-slate-100 dark:bg-slate-700 text-slate-800 dark:text-slate-200">
                                                <span x-text="employee.nama"></span>
                                                <button type="button" 
                                                        @click="removeEmployee(employee.id)" 
                                                        class="ml-2 w-4 h-4 text-slate-500 hover:text-slate-700 dark:text-slate-400 dark:hover:text-slate-200">
                                                    <svg fill="none" stroke="currentColor" viewBox="0 0 24 24" class="w-3 h-3">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>
                                    </div>
                                </div>

                                <!-- Employee Checkboxes -->
                                <div class="max-h-60 overflow-y-auto bg-gray-50 dark:bg-gray-700 rounded-xl p-4 space-y-2">
                                    <template x-for="employee in filteredEmployees" :key="employee.id_karyawan">
                                        <label class="flex items-center p-2 rounded-lg hover:bg-gray-100 dark:hover:bg-gray-600 cursor-pointer transition-colors duration-150">
                                            <input type="checkbox" 
                                                   :value="employee.id_karyawan"
                                                   name="id_karyawan[]"
                                                   @change="toggleEmployee(employee)"
                                                   :checked="selectedEmployees.includes(employee.id_karyawan)"
                                                   class="w-4 h-4 text-slate-600 bg-gray-100 dark:bg-gray-600 border-gray-300 dark:border-gray-500 rounded focus:ring-slate-500 dark:focus:ring-slate-400 focus:ring-2">
                                            <span class="ml-3 text-sm text-gray-900 dark:text-gray-100" x-text="employee.nama"></span>
                                        </label>
                                    </template>
                                    
                                    <!-- No Results -->
                                    <div x-show="filteredEmployees.length === 0" class="text-center py-4">
                                        <p class="text-sm text-gray-500 dark:text-gray-400">Tidak ada karyawan ditemukan</p>
                                    </div>
                                </div>

                                <!-- Select All / Clear All -->
                                <div class="flex justify-between mt-3">
                                    <button type="button" 
                                            @click="selectAll()" 
                                            class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 font-medium">
                                        Pilih Semua
                                    </button>
                                    <button type="button" 
                                            @click="clearAll()" 
                                            class="text-sm text-slate-600 dark:text-slate-400 hover:text-slate-800 dark:hover:text-slate-200 font-medium">
                                        Bersihkan
                                    </button>
                                </div>
                            </div>
                            @error('id_karyawan')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                            @error('id_karyawan.*')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <!-- Description Field -->
                        <div class="space-y-2">
                            <label for="deskripsi_timbangan" class="block text-sm font-medium text-gray-900 dark:text-gray-100">Deskripsi/Keterangan</label>
                            <textarea name="deskripsi_timbangan" id="deskripsi_timbangan" rows="4" class="w-full px-4 py-3 bg-gray-50 dark:bg-gray-700 border-0 rounded-xl text-gray-900 dark:text-gray-100 placeholder-gray-500 dark:placeholder-gray-400 resize-none focus:bg-white dark:focus:bg-gray-600 focus:ring-2 focus:ring-slate-500 dark:focus:ring-slate-400 focus:ring-offset-0 transition-all duration-200">{{ old('deskripsi_timbangan', $timbangan->deskripsi_timbangan) }}</textarea>
                            @error('deskripsi_timbangan')<p class="mt-1 text-sm text-red-600 dark:text-red-400">{{ $message }}</p>@enderror
                        </div>

                        <!-- Action Buttons -->
                        <div class="flex gap-3 pt-4">
                            <button type="submit" class="flex-1 bg-slate-800 dark:bg-slate-700 text-white py-3 px-6 rounded-xl font-medium hover:bg-slate-900 dark:hover:bg-slate-600 transition-colors duration-200">
                                Update
                            </button>
                            <a href="{{ route('timbangans.index') }}" class="flex-1 bg-gray-100 dark:bg-gray-700 text-gray-700 dark:text-gray-300 py-3 px-6 rounded-xl font-medium hover:bg-gray-200 dark:hover:bg-gray-600 transition-colors duration-200 text-center">
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        function employeeSelector() {
            return {
                searchQuery: '',
                // Pre-select the current employee from the timbangan record
                selectedEmployees: @json(old('id_karyawan', $timbangan->id_karyawan ? [$timbangan->id_karyawan] : [])),
                allEmployees: @json($karyawans->toArray()),
                filteredEmployees: @json($karyawans->toArray()),

                init() {
                    this.filterEmployees();
                },

                filterEmployees() {
                    if (this.searchQuery.trim() === '') {
                        this.filteredEmployees = this.allEmployees;
                    } else {
                        this.filteredEmployees = this.allEmployees.filter(employee => 
                            employee.nama.toLowerCase().includes(this.searchQuery.toLowerCase())
                        );
                    }
                },

                toggleEmployee(employee) {
                    const index = this.selectedEmployees.indexOf(employee.id_karyawan);
                    if (index > -1) {
                        this.selectedEmployees.splice(index, 1);
                    } else {
                        this.selectedEmployees.push(employee.id_karyawan);
                    }
                },

                removeEmployee(employeeId) {
                    const index = this.selectedEmployees.indexOf(employeeId);
                    if (index > -1) {
                        this.selectedEmployees.splice(index, 1);
                    }
                },

                selectAll() {
                    this.selectedEmployees = this.filteredEmployees.map(emp => emp.id_karyawan);
                },

                clearAll() {
                    this.selectedEmployees = [];
                },

                getSelectedEmployeeNames() {
                    return this.allEmployees.filter(emp => 
                        this.selectedEmployees.includes(emp.id_karyawan)
                    );
                }
            }
        }
    </script>
</x-app-layout>