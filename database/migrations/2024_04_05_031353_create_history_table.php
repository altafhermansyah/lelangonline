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
        Schema::create('history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_lelang');
            $table->unsignedBigInteger('id_barang');
            $table->unsignedBigInteger('id_masyarakat');
            $table->integer('penawaran');

            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_masyarakat')->references('id')->on('masyarakat');
            $table->foreign('id_lelang')->references('id')->on('lelang');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history');
    }
};
