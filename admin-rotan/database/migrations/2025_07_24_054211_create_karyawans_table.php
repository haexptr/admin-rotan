<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('karyawans', function (Blueprint $table) {
            $table->id('id_karyawan'); // Primary Key
            $table->string('nama', 100);
            $table->text('alamat');
            $table->string('no_telp', 20);
            $table->decimal('memuat_timbangan_in', 8, 2)->default(0); // Kg
            $table->decimal('memuat_timbangan_out', 8, 2)->default(0); // Kg
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('karyawans');
    }
};