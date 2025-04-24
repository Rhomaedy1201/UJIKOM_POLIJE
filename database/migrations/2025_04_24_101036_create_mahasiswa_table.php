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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->id();
            $table->string('nim', 9)->unique();
            $table->string('nama', 150);
            $table->string('alamat', 150);
            $table->string('no_hp', 12);
            $table->string('semester', 2);
            $table->unsignedBigInteger("id_gol");
            $table->timestamps();

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
        Schema::dropIfExists('mahasiswa');
    }
};
