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
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp');
            $table->string('name');
            $table->string('type');
            $table->string('transmisi');
            $table->string('gas');
            $table->string('color');
            $table->string('capacity');
            $table->string('facility');
            $table->string('plat');
            $table->string('stnk');
            $table->string('kategori');
            $table->date('kontrak_mulai');
            $table->date('kontrak_selesai');
            $table->string('service');
            $table->string('bagasi');
            $table->string('harga');
            $table->string('status');
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
        Schema::dropIfExists('cars');
    }
};
