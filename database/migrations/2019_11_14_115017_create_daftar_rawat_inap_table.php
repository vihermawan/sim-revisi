<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDaftarRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('daftar_rawat_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->datetime('tanggal_mutasi');
            $table->bigInteger('id_ruang')->unsigned();
            $table->bigInteger('id_transaksi_rawat_jalan')->unsigned();
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('daftar_rawat_inap');
    }
}
