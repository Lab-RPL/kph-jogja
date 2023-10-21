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
        Schema::create('produksi', function (Blueprint $table) {
            $table->bigIncrements('id_prod');
            $table->unsignedBigInteger('id_ptk');
            $table->float('berat_volume');
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();

            $table->foreign('id_ptk')->references('id_ptk')->on('petak');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('produksi');
    }
};
