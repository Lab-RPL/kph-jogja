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
        Schema::create('data_tegak', function (Blueprint $table) {
            $table->id('id_tgk')->autoIncrement()->primary();

            $table->integer('no_pohon');
            $table->string('jenis_tgk');
            $table->decimal('diameter');
            $table->decimal('tinggi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_tegak');
    }
};
