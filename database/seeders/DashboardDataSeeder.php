<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Karyawan;
use App\Models\Absensi;
use App\Models\Timbangan;
use App\Models\Gaji;
use Carbon\Carbon;

class DashboardDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Buat data karyawan
        $karyawans = [
            [
                'nama' => 'Ahmad Sutrisno',
                'alamat' => 'Jl. Raya Bogor No. 123',
                'no_telp' => '081234567890',
                'memuat_timbangan_in' => true,
                'memuat_timbangan_out' => true
            ],
            [
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Sudirman No. 456',
                'no_telp' => '081234567891',
                'memuat_timbangan_in' => true,
                'memuat_timbangan_out' => false
            ],
            [
                'nama' => 'Citra Dewi',
                'alamat' => 'Jl. Thamrin No. 789',
                'no_telp' => '081234567892',
                'memuat_timbangan_in' => false,
                'memuat_timbangan_out' => true
            ],
            [
                'nama' => 'Dedi Kurniawan',
                'alamat' => 'Jl. Gatot Subroto No. 321',
                'no_telp' => '081234567893',
                'memuat_timbangan_in' => true,
                'memuat_timbangan_out' => true
            ],
            [
                'nama' => 'Eka Sari',
                'alamat' => 'Jl. HR Rasuna Said No. 654',
                'no_telp' => '081234567894',
                'memuat_timbangan_in' => false,
                'memuat_timbangan_out' => false
            ]
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::create($karyawan);
        }

        // Ambil semua karyawan yang baru dibuat
        $allKaryawan = Karyawan::all();

        // Buat data absensi untuk 30 hari terakhir
        for ($i = 30; $i >= 1; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            
            foreach ($allKaryawan as $karyawan) {
                $random = rand(1, 10);
                $hadir = $random <= 8; // 80% kemungkinan hadir
                $izin = !$hadir && $random == 9; // 10% kemungkinan izin
                $tidak_hadir = !$hadir && !$izin; // 10% kemungkinan tidak hadir

                Absensi::create([
                    'tanggal' => $tanggal,
                    'hadir' => $hadir,
                    'tidak_hadir' => $tidak_hadir,
                    'izin' => $izin,
                    'id_karyawan' => $karyawan->id_karyawan
                ]);
            }
        }

        // Buat data timbangan
        $penjualRotan = [
            'Pak Joko - Supplier Rotan Mentah',
            'Bu Siti - Rotan Berkualitas',
            'CV. Rotan Jaya',
            'Toko Rotan Murah',
            'Pak Budi - Rotan Premium'
        ];

        $deskripsiTimbangan = [
            'Rotan mentah kualitas A - 50kg',
            'Rotan setengah jadi - 35kg',
            'Rotan finishing - 25kg',
            'Rotan export quality - 40kg',
            'Rotan lokal - 30kg'
        ];

        for ($i = 30; $i >= 1; $i--) {
            $tanggal = Carbon::now()->subDays($i);
            $jumlahTimbangan = rand(2, 5); // 2-5 timbangan per hari
            
            for ($j = 0; $j < $jumlahTimbangan; $j++) {
                $karyawan = $allKaryawan->random();
                
                Timbangan::create([
                    'tanggal' => $tanggal,
                    'nama_penjual' => $penjualRotan[array_rand($penjualRotan)],
                    'deskripsi_timbangan' => $deskripsiTimbangan[array_rand($deskripsiTimbangan)],
                    'id_karyawan' => $karyawan->id_karyawan
                ]);
            }
        }

        // Buat data gaji
        $allAbsensi = Absensi::all();
        $allTimbangan = Timbangan::all();

        foreach ($allKaryawan as $karyawan) {
            // Gaji mingguan (4 minggu terakhir)
            for ($week = 4; $week >= 1; $week--) {
                $startWeek = Carbon::now()->subWeeks($week)->startOfWeek();
                $endWeek = Carbon::now()->subWeeks($week)->endOfWeek();
                
                // Hitung absensi dalam minggu ini
                $absensiMingguIni = $allAbsensi->where('id_karyawan', $karyawan->id_karyawan)
                    ->whereBetween('tanggal', [$startWeek, $endWeek])
                    ->where('hadir', true)
                    ->count();
                
                // Hitung timbangan dalam minggu ini
                $timbanganMingguIni = $allTimbangan->where('id_karyawan', $karyawan->id_karyawan)
                    ->whereBetween('tanggal', [$startWeek, $endWeek])
                    ->count();
                
                // Gaji mingguan = (hari hadir * 50000) + (timbangan * 25000)
                $gajiMingguan = ($absensiMingguIni * 50000) + ($timbanganMingguIni * 25000);
                
                // Ambil absensi dan timbangan random untuk relasi
                $absensiSample = $allAbsensi->where('id_karyawan', $karyawan->id_karyawan)
                    ->whereBetween('tanggal', [$startWeek, $endWeek])
                    ->first();
                
                $timbanganSample = $allTimbangan->where('id_karyawan', $karyawan->id_karyawan)
                    ->whereBetween('tanggal', [$startWeek, $endWeek])
                    ->first();
                
                if ($absensiSample && $timbanganSample) {
                    Gaji::create([
                        'mingguan' => $gajiMingguan,
                        'statistik_dalam_bulanan' => $gajiMingguan * 4, // Estimasi bulanan
                        'id_karyawan' => $karyawan->id_karyawan,
                        'id_absensi' => $absensiSample->id_absensi,
                        'id_timbangan' => $timbanganSample->id_timbangan
                    ]);
                }
            }
        }
    }
}