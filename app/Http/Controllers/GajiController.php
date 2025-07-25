<?php

namespace App\Http\Controllers;

use App\Models\Gaji;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Timbangan;
use Illuminate\Http\Request;

class GajiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $gajis = Gaji::with(['karyawan', 'absensi', 'timbangan'])->latest()->paginate(10);
        return view('gajis.index', compact('gajis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        $absensis = Absensi::with('karyawan')->get();
        $timbangans = Timbangan::with('karyawan')->get();
        
        return view('gajis.create', compact('karyawans', 'absensis', 'timbangans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'mingguan' => 'required|numeric|min:0',
            'statistik_dalam_bulanan' => 'required|numeric|min:0',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'id_absensi' => 'required|exists:absensis,id_absensi',
            'id_timbangan' => 'required|exists:timbangans,id_timbangan',
        ]);

        Gaji::create($validated);

        return redirect()->route('gajis.index')
            ->with('success', 'Data gaji berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Gaji $gaji)
    {
        $gaji->load(['karyawan', 'absensi', 'timbangan']);
        return view('gajis.show', compact('gaji'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Gaji $gaji)
    {
        $karyawans = Karyawan::all();
        $absensis = Absensi::with('karyawan')->get();
        $timbangans = Timbangan::with('karyawan')->get();
        
        return view('gajis.edit', compact('gaji', 'karyawans', 'absensis', 'timbangans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Gaji $gaji)
    {
        $validated = $request->validate([
            'mingguan' => 'required|numeric|min:0',
            'statistik_dalam_bulanan' => 'required|numeric|min:0',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'id_absensi' => 'required|exists:absensis,id_absensi',
            'id_timbangan' => 'required|exists:timbangans,id_timbangan',
        ]);

        $gaji->update($validated);

        return redirect()->route('gajis.index')
            ->with('success', 'Data gaji berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Gaji $gaji)
    {
        $gaji->delete();

        return redirect()->route('gajis.index')
            ->with('success', 'Data gaji berhasil dihapus!');
    }

    /**
     * Calculate automatic salary based on attendance and weight
     */
    public function calculate(Request $request)
    {
        $validated = $request->validate([
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
        ]);

        $karyawan = Karyawan::find($validated['id_karyawan']);
        
        // Hitung kehadiran dalam periode
        $totalKehadiran = Absensi::where('id_karyawan', $karyawan->id_karyawan)
            ->whereBetween('tanggal', [$validated['start_date'], $validated['end_date']])
            ->where('hadir', true)
            ->count();

        // Hitung total timbangan dalam periode
        $totalTimbangan = Timbangan::where('id_karyawan', $karyawan->id_karyawan)
            ->whereBetween('tanggal', [$validated['start_date'], $validated['end_date']])
            ->count();

        // Rumus gaji (contoh): Kehadiran * 50000 + Timbangan * 25000
        $gajiMingguan = ($totalKehadiran * 50000) + ($totalTimbangan * 25000);
        $gajiBulanan = $gajiMingguan * 4; // Asumsi 4 minggu

        return response()->json([
            'total_kehadiran' => $totalKehadiran,
            'total_timbangan' => $totalTimbangan,
            'gaji_mingguan' => $gajiMingguan,
            'gaji_bulanan' => $gajiBulanan,
        ]);
    }
}