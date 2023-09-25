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
            $table->bigIncrements('id_PU');
            $table->date('tanggal');

            $table->unsignedBigInteger('id_ptk');
            $table->foreign('id_ptk')->references('id_ptk')->on('petak');

            $table->integer('no_PU');
            $table->double('koor_x');
            $table->double('koor_y');
            $table->string('tanam_sela');
            $table->integer('tahun_tanam');
            $table->float('jarak_tanam');
            $table->integer('umur_tgk');
            $table->string('keadaan_kes');
            $table->string('kerataan_tgk');
            $table->string('kemurnian');
            $table->string('bentuk_lap');
            $table->decimal('derajat_lereng');
            $table->string('landai_lereng');
            $table->string('kerataan_lap');
            $table->string('jns_tanah');
            $table->decimal('kedalaman');
            $table->string('dalaman');
            $table->string('jns_bwh');
            $table->string('kerapatan');
            $table->string('penemuan')->nullable();
            $table->string('erosi')->nullable();
            $table->float('tinggi_tempat')->nullable();
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();
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
