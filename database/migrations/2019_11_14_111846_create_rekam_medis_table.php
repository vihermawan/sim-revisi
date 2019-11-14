<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRekamMedisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekam_medis', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_icd')->unsigned();;
            $table->bigInteger('id_pasien')->unsigned();;
            $table->bigInteger('id_dokter')->unsigned();;
            $table->string('anamesa');
            $table->string('diagnosa');
            $table->string('jenis_diagnosa');
            $table->date('tanggal');
            $table->string('kasus_diagnosa');
            $table->string('pemeriksaan_fisik');
            $table->string('pemeriksaan_penunjang');
            $table->string('catatan');
            $table->string('status_rawat');
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
        Schema::dropIfExists('rekam_medis');
    }
}
