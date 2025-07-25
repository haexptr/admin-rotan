<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    use HasFactory;

    protected $table = 'absensis';
    protected $primaryKey = 'id_absensi';

    protected $fillable = [
        'tanggal',
        'hadir',
        'tidak_hadir',
        'izin',
        'id_karyawan'
    ];

    protected $casts = [
        'tanggal' => 'date',
        'hadir' => 'boolean',
        'tidak_hadir' => 'boolean',
        'izin' => 'boolean'
    ];

    // Relationships
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class, 'id_absensi', 'id_absensi');
    }
}