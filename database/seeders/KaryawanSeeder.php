<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Karyawan;

class KaryawanSeeder extends Seeder
{
    public function run(): void
    {
        $karyawans = [
            [
                'nama' => 'Budi Santoso',
                'alamat' => 'Jl. Rotan Raya No. 123, Jakarta',
                'no_telp' => '081234567890',
                'memuat_timbangan_in' => 50.5,
                'memuat_timbangan_out' => 48.2
            ],
            [
                'nama' => 'Siti Nurhaliza',
                'alamat' => 'Jl. Bambu Indah No. 456, Bogor',
                'no_telp' => '081234567891',
                'memuat_timbangan_in' => 45.0,
                'memuat_timbangan_out' => 43.8
            ],
            [
                'nama' => 'Ahmad Wijaya',
                'alamat' => 'Jl. Anyaman No. 789, Depok',
                'no_telp' => '081234567892',
                'memuat_timbangan_in' => 52.3,
                'memuat_timbangan_out' => 50.1
            ]
        ];

        foreach ($karyawans as $karyawan) {
            Karyawan::create($karyawan);
        }
    }
}