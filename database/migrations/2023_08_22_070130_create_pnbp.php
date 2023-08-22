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
        Schema::create('pnbp', function (Blueprint $table) {
            $table->id("id_pnbp")->autoIncrement()->primary();
            $table->integer('tahun_pnbp');
            $table->decimal('nominal_pnbp');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pnbp');
    }
};