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
            $table->id('id_rusak')->autoIncrement()->primary();
            $table->integer('jns_rusak');
            $table->timestamps('tgl_input');
            $table->date('tgl_rusak');

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
