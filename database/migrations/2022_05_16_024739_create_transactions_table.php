<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('id_karyawan');
            $table->string('id_customer');
            $table->string('id_driver');
            $table->string('id_aset');
            $table->string('tgl_transaksi');
            $table->string('tgl_mulai');
            $table->string('tgl_selesai');
            $table->string('rating_driver');
            $table->string('tgl_pengembalian');
            $table->string('status');
            $table->string('komentar');
            $table->string('rating_rental');
            $table->string('komentar_rental');
            $table->string('jenis_transaksi');
            $table->string('metode_pembayaran');
            $table->string('sub_total');
            $table->string('denda');
            $table->string('id_promo');
            $table->string('diskon'); 
            $table->string('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
};
