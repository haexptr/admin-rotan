<?php

namespace App\Http\Controllers;

use App\Models\Timbangan;
use App\Models\Karyawan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
            'id_karyawan' => 'required', // Accept both single value and array
        ]);

        // Handle multi-select: if array is passed, take the first employee
        // This allows the multi-select interface to work while storing single employee
        if (is_array($validated['id_karyawan'])) {
            $validated['id_karyawan'] = $validated['id_karyawan'][0];
        }

        // Validate the employee exists
        $request->validate([
            'id_karyawan' => 'exists:karyawans,id_karyawan',
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
            'id_karyawan' => 'required',
        ]);

        // Handle multi-select: if array is passed, take the first employee
        if (is_array($validated['id_karyawan'])) {
            $validated['id_karyawan'] = $validated['id_karyawan'][0];
        }

        // Validate the employee exists
        $request->validate([
            'id_karyawan' => 'exists:karyawans,id_karyawan',
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
        try {
            // Delete related gajis records first if they exist
            DB::table('gajis')->where('id_timbangan', $timbangan->id_timbangan)->delete();
            
            // Then delete the timbangan record
            $timbangan->delete();

            return redirect()->route('timbangans.index')
                ->with('success', 'Data timbangan berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->route('timbangans.index')
                ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    /**
     * Bulk delete timbangan records based on time period
     * Fixed to handle foreign key constraints properly
     */
    public function bulkDelete(Request $request)
    {
        $period = $request->get('period');
        $deletedCount = 0;
        
        try {
            // Use database transaction for safety
            DB::beginTransaction();
            
            switch ($period) {
                case '1_month':
                    $records = Timbangan::where('tanggal', '>=', now()->subMonth());
                    $deletedCount = $records->count();
                    
                    // Delete related records first
                    $recordIds = $records->pluck('id_timbangan')->toArray();
                    if (!empty($recordIds)) {
                        // Delete related gajis records if they exist
                        DB::table('gajis')->whereIn('id_timbangan', $recordIds)->delete();
                        // Delete the timbangan records
                        $records->delete();
                    }
                    break;
                    
                case '3_months':
                    $records = Timbangan::where('tanggal', '>=', now()->subMonths(3));
                    $deletedCount = $records->count();
                    
                    $recordIds = $records->pluck('id_timbangan')->toArray();
                    if (!empty($recordIds)) {
                        DB::table('gajis')->whereIn('id_timbangan', $recordIds)->delete();
                        $records->delete();
                    }
                    break;
                    
                case '6_months':
                    $records = Timbangan::where('tanggal', '>=', now()->subMonths(6));
                    $deletedCount = $records->count();
                    
                    $recordIds = $records->pluck('id_timbangan')->toArray();
                    if (!empty($recordIds)) {
                        DB::table('gajis')->whereIn('id_timbangan', $recordIds)->delete();
                        $records->delete();
                    }
                    break;
                    
                case '12_months':
                    $records = Timbangan::where('tanggal', '>=', now()->subYear());
                    $deletedCount = $records->count();
                    
                    $recordIds = $records->pluck('id_timbangan')->toArray();
                    if (!empty($recordIds)) {
                        DB::table('gajis')->whereIn('id_timbangan', $recordIds)->delete();
                        $records->delete();
                    }
                    break;
                    
                case 'all':
                    $deletedCount = Timbangan::count();
                    
                    // Disable foreign key checks for MySQL
                    DB::statement('SET FOREIGN_KEY_CHECKS=0;');
                    
                    // Delete all related records first
                    DB::table('gajis')->truncate(); // Delete all gajis first
                    DB::table('timbangans')->truncate(); // Then delete all timbangans
                    
                    // Re-enable foreign key checks
                    DB::statement('SET FOREIGN_KEY_CHECKS=1;');
                    break;
                    
                default:
                    DB::rollBack();
                    return redirect()->route('timbangans.index')
                        ->with('error', 'Periode penghapusan tidak valid.');
            }
            
            // Commit the transaction
            DB::commit();
            
            $periodNames = [
                '1_month' => '1 bulan terakhir',
                '3_months' => '3 bulan terakhir', 
                '6_months' => '6 bulan terakhir',
                '12_months' => '12 bulan terakhir',
                'all' => 'semua data'
            ];
            
            $periodName = $periodNames[$period] ?? 'data yang dipilih';
            
            return redirect()->route('timbangans.index')
                ->with('success', "Berhasil menghapus {$deletedCount} data timbangan dari {$periodName}.");
            
        } catch (\Exception $e) {
            // Rollback transaction on error
            DB::rollBack();
            
            // Make sure foreign key checks are re-enabled
            try {
                DB::statement('SET FOREIGN_KEY_CHECKS=1;');
            } catch (\Exception $fkException) {
                // Log this but don't throw
            }
            
            return redirect()->route('timbangans.index')
                ->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
        }
    }
}