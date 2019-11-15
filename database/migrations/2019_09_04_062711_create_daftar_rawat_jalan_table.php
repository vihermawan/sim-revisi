<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDaftarRawatJalanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_rawat_jalan', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('tanggal_kunjungan');
            $table->bigInteger('id_pasien')->unsigned();
            $table->bigInteger('id_icd')->unsigned();
            $table->bigInteger('id_diagnosa')->unsigned();
            $table->bigInteger('id_dokter')->unsigned();
            $table->bigInteger('id_poli')->unsigned();
            $table->bigInteger('id_user')->unsigned();
            $table->string('keterangan');
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
        Schema::dropIfExists('daftar_rawat_jalan');
    }
}
