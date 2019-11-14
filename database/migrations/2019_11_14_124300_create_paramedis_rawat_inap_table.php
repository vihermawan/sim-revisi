<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParamedisRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('paramedis_rawat_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_transaksi_medis_rawat_inap')->unsigned();
            $table->bigInteger('id_dokter')->unsigned();
            $table->bigInteger('id_pasien')->unsigned();
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
        Schema::dropIfExists('paramedis_rawat_inap');
    }
}
