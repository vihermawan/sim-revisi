<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePasienTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pasien', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_pasien');
            $table->string('no_identitas')->nullable();
            $table->string('jenis_kelamin');
            $table->string('alamat')->nullable();
            $table->string('kelurahan')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('propinsi')->nullable();
            $table->string('status')->nullable();
            $table->string('agama')->nullable();
            $table->string('umur')->nullable();
            $table->string('tanggal_lahir')->nullable();
            $table->string('tanggal_kunjungan')->nullable();
            $table->string('golongan_darah')->nullable();
            $table->string('pendidikan')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->string('pekerjaan')->nullable();
            $table->string('nama_wali')->nullable();
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
        Schema::dropIfExists('pasien');
    }
}
