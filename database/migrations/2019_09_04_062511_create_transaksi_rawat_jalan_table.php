<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiRawatJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_rawat_jalan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_daftar_rawat_jalan')->unsigned();
            $table->string('catatan');
            $table->string('alergi');
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
        Schema::dropIfExists('data_transaksi_rawat_jalan');
    }
}
