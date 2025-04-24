<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('presensi_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('hari', 10);
            $table->date('tanggal');
            $table->enum('status_kehadiran', ['hadir', 'tidak']);
            $table->string('kode_mk', 10);
            $table->timestamps();

            $table->foreign('kode_mk')
                ->references('kode_mk')
                ->on('matakuliah')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensi_akademik');
    }
};
