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
        Schema::create('hhk', function (Blueprint $table) {
            $table->bigIncrements('id_hhk');
            $table->string('jenis_tgk');
            $table->decimal('luas_hasil_hutan');
            $table->decimal('volume_hasil_hutan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hhk');
    }
};