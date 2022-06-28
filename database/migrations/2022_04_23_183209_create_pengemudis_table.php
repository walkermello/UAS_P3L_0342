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
        Schema::create('pengemudis', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alamat');
            $table->string('tgl_lahir');
            $table->string('email')->unique();
            $table->string('no_telp');
            $table->string('gender');
            $table->string('bahasa');
            $table->string('foto');
            $table->string('sim');
            $table->string('bebas_napza');
            $table->string('kesehatan_jiwa');
            $table->string('kesehatan_jasmani');
            $table->string('skck');
            $table->string('status');
            $table->string('harga_sewa');
            $table->string('rating');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
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
        Schema::dropIfExists('pengemudis');
    }
};
