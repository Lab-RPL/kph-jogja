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
        Schema::create('rusak_hilang', function (Blueprint $table) {
            $table->bigIncrements('id_rusak');
            $table->integer('jns_rusak');
            $table->date('tgl_input');
            $table->date('tgl_rusak');

            $table->unsignedBigInteger('id_PU');
            $table->foreign('id_PU')->references('id_PU')->on('data_utama');

            $table->integer('no_PU');
            $table->decimal('diameter');
            $table->binary('Foto');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rusak_hilang');
    }
};
