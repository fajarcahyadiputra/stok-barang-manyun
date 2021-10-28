<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangMasukTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang_masuk', function (Blueprint $table) {
            $table->id();
            $table->integer('id_barang');
            $table->integer('id_supplier');
            $table->string('no_po', 100);
            $table->enum('satuan', ['pcs', 'lb', 'btg']);
            $table->integer('jumblah');
            $table->string('no_surat_jalan', 100);
            $table->string('penerima', 100);
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
        Schema::dropIfExists('barang_masuk');
    }
}
