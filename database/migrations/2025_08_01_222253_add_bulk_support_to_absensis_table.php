<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            $table->boolean('is_auto_generated')->default(false)->after('id_karyawan');
            $table->enum('batch_type', ['manual', 'daily_auto', 'bulk_input'])->default('manual')->after('is_auto_generated');
            $table->string('batch_id', 50)->nullable()->after('batch_type')->index();
        });
    }

    public function down(): void
    {
        Schema::table('absensis', function (Blueprint $table) {
            $table->dropColumn(['is_auto_generated', 'batch_type', 'batch_id']);
        });
    }
};