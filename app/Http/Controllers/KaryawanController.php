<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Traits\ExportableTrait;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    use ExportableTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karyawans = Karyawan::latest()->paginate(10);
        
        // Statistik untuk dashboard
        $stats = [
            'total_employees' => Karyawan::count(),
            'active_employees' => Karyawan::where('memuat_timbangan_in', '>', 0)->count(),
            'total_weight_in' => Karyawan::sum('memuat_timbangan_in'),
            'total_weight_out' => Karyawan::sum('memuat_timbangan_out'),
        ];
        
        return view('karyawans.index', compact('karyawans', 'stats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('karyawans.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'memuat_timbangan_in' => 'nullable|numeric|min:0',
            'memuat_timbangan_out' => 'nullable|numeric|min:0',
        ]);

        Karyawan::create($validated);

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Karyawan $karyawan)
    {
        $karyawan->load(['timbangans', 'absensis', 'gajis']);
        return view('karyawans.show', compact('karyawan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Karyawan $karyawan)
    {
        return view('karyawans.edit', compact('karyawan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Karyawan $karyawan)
    {
        $validated = $request->validate([
            'nama' => 'required|string|max:100',
            'alamat' => 'required|string',
            'no_telp' => 'required|string|max:20',
            'memuat_timbangan_in' => 'nullable|numeric|min:0',
            'memuat_timbangan_out' => 'nullable|numeric|min:0',
        ]);

        $karyawan->update($validated);

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Karyawan $karyawan)
    {
        $karyawan->delete();

        return redirect()->route('karyawans.index')
            ->with('success', 'Karyawan berhasil dihapus!');
    }

    /**
     * Export karyawan data to Excel
     */
    public function export()
    {
        $karyawans = Karyawan::all();
        
        $headers = [
            'nama' => 'Nama',
            'alamat' => 'Alamat',
            'no_telp' => 'No Telepon',
            'memuat_timbangan_in' => 'Timbangan In (Kg)',
            'memuat_timbangan_out' => 'Timbangan Out (Kg)'
        ];
        
        return $this->exportToExcel($karyawans, $headers, 'data_karyawan_' . date('Y-m-d'));
    }
}