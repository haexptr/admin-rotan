<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;

    protected $table = 'karyawans';
    protected $primaryKey = 'id_karyawan';

    protected $fillable = [
        'nama',
        'alamat',
        'no_telp',
        'memuat_timbangan_in',
        'memuat_timbangan_out'
    ];

    // Relationships
    public function timbangans()
    {
        return $this->hasMany(Timbangan::class, 'id_karyawan', 'id_karyawan');
    }

    public function absensis()
    {
        return $this->hasMany(Absensi::class, 'id_karyawan', 'id_karyawan');
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class, 'id_karyawan', 'id_karyawan');
    }
}