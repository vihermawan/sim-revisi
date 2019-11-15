<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTindakanMedisInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_tindakan_medis_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jumlah');
            $table->bigInteger('id_tindakan')->unsigned();
            $table->bigInteger('id_ruang')->unsigned();
            $table->bigInteger('id_pasien')->unsigned();
            $table->bigInteger('id_dokter')->unsigned();
            $table->date('tanggal_permintaan');
            $table->string('status_proses');
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
        Schema::dropIfExists('transaksi_tindakan_medis_inap');
    }
}
