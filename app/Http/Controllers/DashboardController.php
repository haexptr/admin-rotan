<?php

namespace App\Http\Controllers;

use App\Models\Karyawan;
use App\Models\Timbangan;
use App\Models\Absensi;
use App\Models\Gaji;
use Illuminate\Http\Request;
use Carbon\Carbon;

class DashboardController extends Controller
{
    public function index()
    {
        // Statistik umum
        $totalKaryawan = Karyawan::count();
        $totalTimbangan = Timbangan::count();
        $totalAbsensi = Absensi::count();
        $totalGaji = Gaji::sum('statistik_dalam_bulanan');

        // Statistik bulan ini
        $bulanIni = Carbon::now()->month;
        $tahunIni = Carbon::now()->year;

        $timbangangBulanIni = Timbangan::whereMonth('tanggal', $bulanIni)
            ->whereYear('tanggal', $tahunIni)
            ->count();

        $absensiBulanIni = Absensi::whereMonth('tanggal', $bulanIni)
            ->whereYear('tanggal', $tahunIni)
            ->where('hadir', true)
            ->count();

        // Karyawan dengan absensi terbaik bulan ini
        $karyawanTerbaik = Karyawan::withCount(['absensis' => function($query) use ($bulanIni, $tahunIni) {
            $query->whereMonth('tanggal', $bulanIni)
                  ->whereYear('tanggal', $tahunIni)
                  ->where('hadir', true);
        }])->orderBy('absensis_count', 'desc')->limit(5)->get();

        // Data untuk chart (7 hari terakhir)
        $chartData = [];
        for ($i = 6; $i >= 0; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $chartData[] = [
                'tanggal' => $tanggal->format('Y-m-d'),
                'absensi' => Absensi::whereDate('tanggal', $tanggal)->where('hadir', true)->count(),
                'timbangan' => Timbangan::whereDate('tanggal', $tanggal)->count(),
            ];
        }

        return view('dashboard', compact(
            'totalKaryawan',
            'totalTimbangan', 
            'totalAbsensi',
            'totalGaji',
            'timbangangBulanIni',
            'absensiBulanIni',
            'karyawanTerbaik',
            'chartData'
        ));
    }
}