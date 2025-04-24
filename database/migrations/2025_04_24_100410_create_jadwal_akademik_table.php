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
        Schema::create('jadwal_akademik', function (Blueprint $table) {
            $table->id();
            $table->string('hari', 10);
            $table->string('kode_mk', 10);
            $table->unsignedBigInteger("id_ruang");
            $table->unsignedBigInteger("id_gol");
            $table->timestamps();

            $table->foreign('kode_mk')
                ->references('kode_mk')
                ->on('matakuliah')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_ruang')
                ->references('id')
                ->on('ruang')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('id_gol')
                ->references('id')
                ->on('golongan')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_akademik');
    }
};
