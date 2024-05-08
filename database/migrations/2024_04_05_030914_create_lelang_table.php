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
        Schema::create('lelang', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_barang')->unsigned();
            $table->date('tgl_lelang');
            $table->integer('harga_akhir');
            $table->unsignedBigInteger('id_users')->unsigned();
            $table->unsignedBigInteger('id_masyarakat')->unsigned();
            $table->enum('status', ['dibuka', 'ditutup'])->default('ditutup');

            $table->foreign('id_barang')->references('id')->on('barang');
            $table->foreign('id_users')->references('id')->on('users');
            $table->foreign('id_masyarakat')->references('id')->on('masyarakat');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lelang');
    }
};
