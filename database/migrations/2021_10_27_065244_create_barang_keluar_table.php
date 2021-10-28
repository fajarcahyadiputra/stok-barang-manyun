<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangKeluarTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_keluar', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_customer');
            $table->integer('no_po');
            $table->integer('no_surat_jalan');
            $table->enum('satuan', ['pcs', 'lb', 'btg']);
            $table->integer('jumblah');
            $table->integer('sisa_stok');
            $table->string('yg_mengeluarkan', 100);
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
        Schema::dropIfExists('barang_keluar');
    }
}
