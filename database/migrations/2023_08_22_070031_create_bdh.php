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
        Schema::create('bdh', function (Blueprint $table) {
            $table->bigIncrements('id_bdh');
            $table->string('nama_bdh');
            $table->string('kepala_bdh');
            $table->decimal('luas_bdh');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bdh');
    }
};
