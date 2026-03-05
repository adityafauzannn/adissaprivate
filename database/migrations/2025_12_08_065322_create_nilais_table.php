<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        // TABEL SUDAH ADA DI RAILWAY, jadi jangan create lagi
        // Schema::create('nilais', function (Blueprint $table) {
        //     $table->id();
        //     $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
        //     $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
        //     $table->integer('nilai');
        //     $table->text('evaluasi')->nullable();
        //     $table->foreignId('pertemuan_id')->constrained('pertemuans')->cascadeOnDelete();
        //     $table->timestamps();
        // });
    }

    public function down(): void
    {
        // Kalau ingin rollback, bisa dihapus manual
        // Schema::dropIfExists('nilais');
    }
};