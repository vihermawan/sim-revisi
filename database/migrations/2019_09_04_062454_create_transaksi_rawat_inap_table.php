<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransaksiRawatInapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transaksi_rawat_inap', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_daftar_rawat_inap')->unsigned();
            $table->string('status_rawat_inap');
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
        Schema::dropIfExists('transaksi_rawat_inap');
    }
}
