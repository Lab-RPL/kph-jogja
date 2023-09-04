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
        Schema::create('petak', function (Blueprint $table) {
            $table->bigIncrements('id_ptk');

            $table->integer('nomor_ptk');
            $table->decimal('luas_ptk');
            $table->string('potensi_ptk');
            $table->unsignedBigInteger('id_rph');
            $table->boolean('IsDelete')->default(0);
            $table->foreign('id_rph')->references('id_rph')->on('rph');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('petak');
    }
};
