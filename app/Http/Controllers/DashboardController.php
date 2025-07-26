<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Timbangan;
use App\Models\Gaji;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik Umum
        $totalKaryawan = Karyawan::count();
        $totalAbsensiHariIni = Absensi::whereDate('tanggal', Carbon::today())
            ->where('hadir', true)
            ->count();
        $totalTimbanganHariIni = Timbangan::whereDate('tanggal', Carbon::today())->count();
        $totalGajiBulanIni = Gaji::whereMonth('created_at', Carbon::now()->month)
            ->sum('mingguan');

        // Statistik Absensi 7 Hari Terakhir
        $absensi7Hari = [];
        $tanggal7Hari = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $tanggal7Hari[] = $tanggal->format('d/m');
            $absensi7Hari[] = Absensi::whereDate('tanggal', $tanggal)
                ->where('hadir', true)
                ->count();
        }

        // Statistik Timbangan 7 Hari Terakhir
        $timbangan7Hari = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $timbangan7Hari[] = Timbangan::whereDate('tanggal', $tanggal)->count();
        }

        // Top 5 Karyawan Berdasarkan Kehadiran Bulan Ini
        $topKaryawanAbsensi = Karyawan::withCount(['absensis as total_hadir' => function($query) {
            $query->whereMonth('tanggal', Carbon::now()->month)
                  ->where('hadir', true);
        }])
        ->orderBy('total_hadir', 'desc')
        ->limit(5)
        ->get();

        // Top 5 Karyawan Berdasarkan Timbangan Bulan Ini
        $topKaryawanTimbangan = Karyawan::withCount(['timbangans as total_timbangan' => function($query) {
            $query->whereMonth('tanggal', Carbon::now()->month);
        }])
        ->orderBy('total_timbangan', 'desc')
        ->limit(5)
        ->get();

        // Statistik Gaji Bulanan (6 Bulan Terakhir)
        $gajiBulanan = [];
        $bulanLabels = [];
        for ($i = 5; $i >= 0; $i--) {
            $bulan = Carbon::now()->subMonths($i);
            $bulanLabels[] = $bulan->format('M Y');
            $totalGaji = Gaji::whereMonth('created_at', $bulan->month)
                ->whereYear('created_at', $bulan->year)
                ->sum('statistik_dalam_bulanan');
            $gajiBulanan[] = $totalGaji;
        }

        // Distribusi Status Absensi Bulan Ini
        $absensiStats = [
            'hadir' => Absensi::whereMonth('tanggal', Carbon::now()->month)
                ->where('hadir', true)
                ->count(),
            'izin' => Absensi::whereMonth('tanggal', Carbon::now()->month)
                ->where('izin', true)
                ->count(),
            'tidak_hadir' => Absensi::whereMonth('tanggal', Carbon::now()->month)
                ->where('tidak_hadir', true)
                ->count()
        ];

        // Aktivitas Timbangan per Karyawan
        $timbanganPerKaryawan = Karyawan::withCount(['timbangans as total_timbangan' => function($query) {
            $query->whereMonth('tanggal', Carbon::now()->month);
        }])
        ->get()
        ->pluck('total_timbangan', 'nama');

        // Recent Activities
        $recentAbsensi = Absensi::with('karyawan')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        $recentTimbangan = Timbangan::with('karyawan')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();

        return view('dashboard', compact(
            'totalKaryawan',
            'totalAbsensiHariIni',
            'totalTimbanganHariIni',
            'totalGajiBulanIni',
            'absensi7Hari',
            'timbangan7Hari',
            'tanggal7Hari',
            'topKaryawanAbsensi',
            'topKaryawanTimbangan',
            'gajiBulanan',
            'bulanLabels',
            'absensiStats',
            'timbanganPerKaryawan',
            'recentAbsensi',
            'recentTimbangan'
        ));
    }
}