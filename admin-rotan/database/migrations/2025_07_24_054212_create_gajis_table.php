<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gajis', function (Blueprint $table) {
            $table->id('id_gaji'); // Primary Key
            $table->decimal('mingguan', 10, 2)->default(0);
            $table->decimal('statistik_dalam_bulanan', 10, 2)->default(0);
            $table->unsignedBigInteger('id_karyawan'); // Foreign Key
            $table->unsignedBigInteger('id_absensi'); // Foreign Key
            $table->unsignedBigInteger('id_timbangan'); // Foreign Key
            $table->timestamps();

            // Foreign Key Constraints
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans')->onDelete('cascade');
            $table->foreign('id_absensi')->references('id_absensi')->on('absensis')->onDelete('cascade');
            $table->foreign('id_timbangan')->references('id_timbangan')->on('timbangans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gajis');
    }
};