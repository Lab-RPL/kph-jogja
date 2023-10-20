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
            $table->boolean('jns_rusak')->default(0);
            $table->date('tgl_input');
            $table->date('tgl_rusak');
            $table->unsignedBigInteger('id_ptk');
            $table->foreign('id_ptk')->references('id_ptk')->on('petak');
            $table->double('koor_x');
            $table->double('koor_y');
            $table->string('keterangan');
            $table->decimal('diameter')->nullable();
            $table->binary('foto')->nullable();
            $table->boolean('IsDelete')->default(0);
            $table->timestamps();
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
