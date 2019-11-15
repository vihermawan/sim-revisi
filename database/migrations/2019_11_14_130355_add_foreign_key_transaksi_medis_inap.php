<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyTransaksiMedisInap extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('transaksi_tindakan_medis_inap', function (Blueprint $table) {
            $table->foreign('id_dokter')->references('id')->on('dokter')->onDelete('cascade');
            $table->foreign('id_tindakan')->references('id')->on('tindakan')->onDelete('cascade');
            $table->foreign('id_ruang')->references('id')->on('ruang')->onDelete('cascade');
            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
