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
        Schema::create('izin_kelola', function (Blueprint $table) {
            $table->bigIncrements('id_izin');

            $table->string('nama_kelompok');
            $table->string('no_SK');
            $table->unsignedBigInteger('id_ptk');
            $table->foreign('id_ptk')->references('id_ptk')->on('petak');
            $table->double('luas_izin');
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_kelola');
    }
};
