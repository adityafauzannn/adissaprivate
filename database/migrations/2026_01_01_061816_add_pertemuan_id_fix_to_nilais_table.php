<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  public function up(): void
{
    Schema::table('nilais', function (Blueprint $table) {
        if (!Schema::hasColumn('nilais', 'pertemuan_id')) {
            $table->unsignedBigInteger('pertemuan_id')->after('siswa_id');

            $table->foreign('pertemuan_id')
                  ->references('id')
                  ->on('pertemuans')
                  ->onDelete('cascade');
        }
    });
}

public function down(): void
{
    Schema::table('nilais', function (Blueprint $table) {
        if (Schema::hasColumn('nilais', 'pertemuan_id')) {
            $table->dropForeign(['pertemuan_id']);
            $table->dropColumn('pertemuan_id');
        }
    });
}
};
