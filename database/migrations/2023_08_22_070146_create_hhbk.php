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
        Schema::create('hhbk', function (Blueprint $table) {
            $table->bigIncrements('id_hhbk');

            $table->varchar('nama_wisata');
            $table->text('lokasi_wisata');
            $table->text('atraksi_wisata');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hhbk');
    }
};
