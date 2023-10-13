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
        Schema::create('rph', function (Blueprint $table) {
            $table->bigIncrements('id_rph');
            $table->string('nama_rph');
            $table->string('kepala_rph');
            $table->double('luas_rph');
            $table->unsignedBigInteger('id_bdh');
            $table->boolean('IsDelete')->default(0);
            $table->foreign('id_bdh')->references('id_bdh')->on('bdh');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rph');
    }
};