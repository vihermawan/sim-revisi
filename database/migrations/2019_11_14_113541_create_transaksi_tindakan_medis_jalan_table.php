<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransaksiTindakanMedisJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_tindakan_medis_jalan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('jumlah');
            $table->bigInteger('id_tindakan')->unsigned();
            $table->bigInteger('id_poli')->unsigned();
            $table->bigInteger('id_pasien')->unsigned();
            $table->bigInteger('id_dokter')->unsigned();
            $table->date('tanggal_permintaan');
            $table->string('status_proses');
            $table->string('catatan');
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
        Schema::dropIfExists('transaksi_tindakan_medis_jalan');
    }
}
