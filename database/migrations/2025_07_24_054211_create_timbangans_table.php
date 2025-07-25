<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('timbangans', function (Blueprint $table) {
            $table->id('id_timbangan'); // Primary Key
            $table->date('tanggal');
            $table->string('nama_penjual', 100);
            $table->text('deskripsi_timbangan')->nullable();
            $table->unsignedBigInteger('id_karyawan'); // Foreign Key
            $table->timestamps();

            // Foreign Key Constraint
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('timbangans');
    }
};