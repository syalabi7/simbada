<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAsetsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('asets', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nama_aset');
            $table->string('merk');
            $table->string('tahun');
            $table->string('keterangan');
            $table->string('nilai_barang');
            $table->integer('id_lokasi')->unsigned();
            $table->foreign('id_lokasi')->references('id')->on('locations')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('categories')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_sumber')->unsigned();
            $table->foreign('id_sumber')->references('id')->on('sumber_barangs')->onDelete('cascade')->onUpdate('cascade');
            $table->integer('id_kondisi')->unsigned();
            $table->foreign('id_kondisi')->references('id')->on('kondisi_barangs')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('asets');
    }
}
