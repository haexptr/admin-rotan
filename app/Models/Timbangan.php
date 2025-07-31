<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Timbangan extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     */
    protected $table = 'timbangans';

    /**
     * The primary key associated with the table.
     */
    protected $primaryKey = 'id_timbangan';

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'tanggal',
        'nama_penjual',
        'deskripsi_timbangan',
        'id_karyawan',
    ];

    /**
     * The attributes that should be cast.
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the employee associated with the timbangan.
     */
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan', 'id_karyawan');
    }
}