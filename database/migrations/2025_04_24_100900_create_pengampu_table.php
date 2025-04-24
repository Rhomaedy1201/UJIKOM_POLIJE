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
        Schema::create('pengampu', function (Blueprint $table) {
            $table->id();
            $table->string('kode_mk', 10);
            $table->string('nip', 18);
            $table->timestamps();

            $table->foreign('kode_mk')
                ->references('kode_mk')
                ->on('matakuliah')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->foreign('nip')
                ->references('nip')
                ->on('dosen')
                ->onUpdate('cascade')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pengampu');
    }
};
