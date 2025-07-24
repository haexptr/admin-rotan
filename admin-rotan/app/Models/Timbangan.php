<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbangan extends Model
{
    use HasFactory;

    protected $table = 'timbangans';
    protected $primaryKey = 'id_timbangan';

    protected $fillable = [
        'tanggal',
        'nama_penjual',
        'deskripsi_timbangan',
        'id_karyawan'
    ];

    protected $casts = [
        'tanggal' => 'date'
    ];

    // Relationships
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }

    public function gajis()
    {
        return $this->hasMany(Gaji::class, 'id_timbangan', 'id_timbangan');
    }
}