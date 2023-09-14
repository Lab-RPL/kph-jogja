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
            $table->foreign('id_PU')->references('id_PU')->on('data_utama');

            $table->integer('no_pohon');
            $table->string('jenis_tgk');
            $table->decimal('diameter');
            $table->decimal('tinggi');
            $table->boolean('IsDelete')->default(0);
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
