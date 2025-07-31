<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('timbangan_karyawan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_timbangan');
            $table->unsignedBigInteger('id_karyawan');
            $table->timestamps();

            // Foreign key constraints
            $table->foreign('id_timbangan')->references('id_timbangan')->on('timbangans')->onDelete('cascade');
            $table->foreign('id_karyawan')->references('id_karyawan')->on('karyawans')->onDelete('cascade');

            // Unique constraint to prevent duplicates
            $table->unique(['id_timbangan', 'id_karyawan']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('timbangan_karyawan');
    }
};