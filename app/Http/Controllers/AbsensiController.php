<?php

namespace App\Http\Controllers;

use App\Models\Absensi;
use App\Models\Karyawan;
use App\Jobs\GenerateDailyAttendance;
use App\Traits\ExportableTrait;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

class AbsensiController extends Controller
{
    use ExportableTrait;
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $absensis = Absensi::with('karyawan')->latest()->paginate(10);
        return view('absensis.index', compact('absensis'));
    }

    /**
     * Show bulk attendance form for specific date
     */
    public function bulk(Request $request)
    {
        // Set timezone ke WIB (Asia/Jakarta) dan default ke hari ini
        $today = Carbon::now('Asia/Jakarta');
        $date = $request->input('date', $today->format('Y-m-d'));
        $selectedDate = Carbon::parse($date)->setTimezone('Asia/Jakarta');
        
        // Get all employees with their attendance for the selected date
        $karyawans = Karyawan::with(['absensis' => function($query) use ($selectedDate) {
            $query->whereDate('tanggal', $selectedDate);
        }])->get();
        
        // Transform data for easier handling in view
        $attendanceData = $karyawans->map(function($karyawan) use ($selectedDate) {
            $attendance = $karyawan->absensis->first();
            
            $status = 'hadir'; // default
            if ($attendance) {
                if ($attendance->tidak_hadir) $status = 'tidak_hadir';
                elseif ($attendance->izin) $status = 'izin';
            }
            
            return (object) [
                'karyawan' => $karyawan,
                'attendance' => $attendance,
                'status' => $status,
                'attendance_id' => $attendance?->id_absensi
            ];
        });
        
        return view('absensis.bulk', compact('attendanceData', 'selectedDate'));
    }

    /**
     * Store bulk attendance data
     */
    public function bulkStore(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date',
            'attendance' => 'required|array',
            'attendance.*.id_karyawan' => 'required|exists:karyawans,id_karyawan',
            'attendance.*.status' => 'required|in:hadir,tidak_hadir,izin',
        ]);

        $date = Carbon::parse($validated['date'])->setTimezone('Asia/Jakarta');
        $batchId = 'bulk_' . $date->format('Y_m_d') . '_' . Str::random(8);
        $updated = 0;
        $created = 0;

        foreach ($validated['attendance'] as $attendanceData) {
            $absensiData = [
                'tanggal' => $date,
                'id_karyawan' => $attendanceData['id_karyawan'],
                'hadir' => $attendanceData['status'] === 'hadir',
                'tidak_hadir' => $attendanceData['status'] === 'tidak_hadir',
                'izin' => $attendanceData['status'] === 'izin',
                'batch_type' => 'bulk_input',
                'batch_id' => $batchId,
            ];

            // Check if attendance already exists
            $existingAttendance = Absensi::where('id_karyawan', $attendanceData['id_karyawan'])
                ->whereDate('tanggal', $date)
                ->first();

            if ($existingAttendance) {
                $existingAttendance->update($absensiData);
                $updated++;
            } else {
                $absensiData['is_auto_generated'] = false;
                Absensi::create($absensiData);
                $created++;
            }
        }

        return redirect()->route('absensis.bulk', ['date' => $date->format('Y-m-d')])
            ->with('success', "🎉 Berhasil memperbarui absensi: {$updated} diupdate, {$created} dibuat baru!");
    }

    /**
     * Generate attendance for specific date
     */
    public function generateDaily(Request $request)
    {
        $validated = $request->validate([
            'date' => 'required|date'
        ]);

        $date = Carbon::parse($validated['date'])->setTimezone('Asia/Jakarta');
        
        // Check if already generated
        $existingCount = Absensi::whereDate('tanggal', $date)->count();
        
        if ($existingCount > 0) {
            return redirect()->route('absensis.bulk', ['date' => $date->format('Y-m-d')])
                ->with('warning', '⚠️ Absensi untuk tanggal ini sudah ada!');
        }

        // Dispatch job to generate attendance
        GenerateDailyAttendance::dispatch($date);

        return redirect()->route('absensis.bulk', ['date' => $date->format('Y-m-d')])
            ->with('success', '🤖 Absensi harian berhasil digenerate untuk tanggal ' . $date->format('d/m/Y'));
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
            'batch_type' => 'manual',
            'is_auto_generated' => false,
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

    /**
     * Export absensi data to Excel
     */
    public function export()
    {
        $absensis = Absensi::with('karyawan')->get()->map(function ($absensi) {
            $status = 'Hadir';
            if ($absensi->tidak_hadir) {
                $status = 'Tidak Hadir';
            } elseif ($absensi->izin) {
                $status = 'Izin';
            }
            
            return (object) [
                'tanggal' => $absensi->tanggal->format('d/m/Y'),
                'karyawan_nama' => $absensi->karyawan->nama ?? '-',
                'status' => $status,
                'batch_type' => ucfirst(str_replace('_', ' ', $absensi->batch_type ?? 'manual')),
                'created_at' => $absensi->created_at->format('d/m/Y H:i'),
            ];
        });
        
        $headers = [
            'tanggal' => 'Tanggal',
            'karyawan_nama' => 'Nama Karyawan',
            'status' => 'Status Kehadiran',
            'batch_type' => 'Tipe Input',
            'created_at' => 'Waktu Input'
        ];
        
        return $this->exportToExcel($absensis, $headers, 'data_absensi_' . date('Y-m-d'));
    }
}