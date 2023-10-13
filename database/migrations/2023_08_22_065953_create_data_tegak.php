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
            $table->bigIncrements('id_tgk');

            $table->unsignedBigInteger('id_PU');
            $table->integer('no_pohon');
            $table->unsignedBigInteger('id_hhk')->nullable();
            $table->unsignedBigInteger('id_hhbk')->nullable();
            $table->decimal('diameter');
            $table->decimal('tinggi');
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();

            $table->foreign('id_PU')->references('id_PU')->on('data_utama');
            $table->foreign('id_hhk')->references('id_hhk')->on('hhk');
            $table->foreign('id_hhbk')->references('id_hhbk')->on('hhbk');
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
