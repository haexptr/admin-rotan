<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('absensis', function (Blueprint $table) {
            $table->id('id_absensi'); // Primary Key
            $table->date('tanggal');
            $table->boolean('hadir')->default(false);
            $table->boolean('tidak_hadir')->default(false);
            $table->boolean('izin')->default(false);
            $table->unsignedBigInteger('id_karyawan'); // Foreign Key
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('absensis');
    }
};