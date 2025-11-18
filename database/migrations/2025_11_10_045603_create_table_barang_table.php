<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('tabel_barang', function (Blueprint $table){
            $table->id('id_barang')->primary()->autoIncrement();
            $table->string('kode_barang', 10);
            $table->string('nama_barang', 100);
            $table->foreignId('id_kategori')
                ->constrained('kategori')
                ->onDelete('cascade');
            $table->decimal('harga_barang', 10, 2);
            $table->timestamps();
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::dropIfExists('db_barang');
    }
};
