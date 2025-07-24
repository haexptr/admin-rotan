<?php

namespace App\Http\Controllers;

use App\Models\Timbangan;
use App\Models\Karyawan;
use Illuminate\Http\Request;

class TimbangangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $timbangans = Timbangan::with('karyawan')->latest()->paginate(10);
        return view('timbangans.index', compact('timbangans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $karyawans = Karyawan::all();
        return view('timbangans.create', compact('karyawans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nama_penjual' => 'required|string|max:100',
            'deskripsi_timbangan' => 'nullable|string',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
        ]);

        Timbangan::create($validated);

        return redirect()->route('timbangans.index')
            ->with('success', 'Data timbangan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Timbangan $timbangan)
    {
        $timbangan->load('karyawan');
        return view('timbangans.show', compact('timbangan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Timbangan $timbangan)
    {
        $karyawans = Karyawan::all();
        return view('timbangans.edit', compact('timbangan', 'karyawans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Timbangan $timbangan)
    {
        $validated = $request->validate([
            'tanggal' => 'required|date',
            'nama_penjual' => 'required|string|max:100',
            'deskripsi_timbangan' => 'nullable|string',
            'id_karyawan' => 'required|exists:karyawans,id_karyawan',
        ]);

        $timbangan->update($validated);

        return redirect()->route('timbangans.index')
            ->with('success', 'Data timbangan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Timbangan $timbangan)
    {
        $timbangan->delete();

        return redirect()->route('timbangans.index')
            ->with('success', 'Data timbangan berhasil dihapus!');
    }
}