<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('siswa_id')->constrained('siswas')->onDelete('cascade');
            $table->foreignId('mapel_id')->constrained('mapels')->onDelete('cascade');
            $table->integer('nilai');
            $table->text('evaluasi')->nullable(); // <- HAPUS after()
            $table->foreignId('pertemuan_id')
                ->constrained('pertemuans')
                ->cascadeOnDelete();
            $table->timestamps();
        });
    }
};
