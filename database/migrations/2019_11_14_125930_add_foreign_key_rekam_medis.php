<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeyRekamMedis extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('rekam_medis', function (Blueprint $table) {
            $table->foreign('id_pasien')->references('id')->on('pasien')->onDelete('cascade');
            $table->foreign('id_icd')->references('id')->on('icd')->onDelete('cascade');
            $table->foreign('id_dokter')->references('id')->on('dokter')->onDelete('cascade');
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
