<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensis = Absensi::with('karyawan')->latest()->paginate(10);
        return view('absensis.index', compact('absensis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('absensis.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,tidak_hadir,izin',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
        ]);

        // Set boolean values based on status
        $absensiData = [
            'tanggal' => $validated['tanggal'],
            'id_karyawan' => $validated['id_karyawan'],
            'hadir' => $validated['status'] === 'hadir',
            'tidak_hadir' => $validated['status'] === 'tidak_hadir',
            'izin' => $validated['status'] === 'izin',
        ];

        Absensi::create($absensiData);

        return redirect()->route('absensis.index')
            ->with('success', 'Data absensi berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Absensi $absensi)
    {
        $absensi->load('karyawan');
        return view('absensis.show', compact('absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Absensi $absensi)
    {
        $karyawans = Karyawan::all();
        
        // Determine current status
        $currentStatus = 'hadir';
        if ($absensi->tidak_hadir) {
            $currentStatus = 'tidak_hadir';
        } elseif ($absensi->izin) {
            $currentStatus = 'izin';
        }

        return view('absensis.edit', compact('absensi', 'karyawans', 'currentStatus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Absensi $absensi)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'status' => 'required|in:hadir,tidak_hadir,izin',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
        ]);

        // Set boolean values based on status
        $absensiData = [
            'tanggal' => $validated['tanggal'],
            'id_karyawan' => $validated['id_karyawan'],
            'hadir' => $validated['status'] === 'hadir',
            'tidak_hadir' => $validated['status'] === 'tidak_hadir',
            'izin' => $validated['status'] === 'izin',
        ];

        $absensi->update($absensiData);

        return redirect()->route('absensis.index')
            ->with('success', 'Data absensi berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Absensi $absensi)
    {
        $absensi->delete();

        return redirect()->route('absensis.index')
            ->with('success', 'Data absensi berhasil dihapus!');
    }
}