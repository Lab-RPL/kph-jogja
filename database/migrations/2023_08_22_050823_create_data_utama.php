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
        Schema::create('data_utama', function (Blueprint $table) {
            $table->id('id_PU')->autoIncrement()->primary();
            $table->date('tanggal');


            $table->timestamps();
            $table->integer('no_PU');
            $table->decimal('koor_x');
            $table->decimal('koor_Y');
            $table->string('tanam_sela');
            $table->integer('tahun_tanam');
            $table->float('jarak_tanam');
            $table->integer('umur_tgk');
            $table->string('keadaan_kes');
            $table->string('keadaan_tgk');
            $table->string('kemurnian');
            $table->string('bentuk_lap');
            $table->string('derajat_lereng');
            $table->string('kerataan_lap');
            $table->string('jns_tanah');
            $table->string('kedalaman');
            $table->string('jns_bwh');
            $table->string('kerapatna');
            $table->string('penemuan');
            $table->string('erosi');
            $table->float('ketinggian_tempat');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_utama');
    }
};
