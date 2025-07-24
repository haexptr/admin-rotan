<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gaji extends Model
{
    use HasFactory;

    protected $table = 'gajis';
    protected $primaryKey = 'id_gaji';

    protected $fillable = [
        'mingguan',
        'statistik_dalam_bulanan',
        'id_karyawan',
        'id_absensi',
        'id_timbangan'
    ];

    protected $casts = [
        'mingguan' => 'decimal:2',
        'statistik_dalam_bulanan' => 'decimal:2'
    ];

    // Relationships
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function absensi()
    {
        return $this->belongsTo(Absensi::class, 'id_absensi', 'id_absensi');
    }

    public function timbangan()
    {
        return $this->belongsTo(Timbangan::class, 'id_timbangan', 'id_timbangan');
    }
}