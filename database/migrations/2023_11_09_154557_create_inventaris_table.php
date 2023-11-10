<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
  /**
   * Run the migrations.
   */
  public function up(): void
  {
    Schema::create('inventaris', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cabor_id');
      $table->string('jenis_barang');
      $table->string('harga_satuan');
      $table->string('tahun'); // aset habis pakai = bulan/tahun, aset tidak habis pakai = tahun beli
      $table->string('jumlah'); // aset habis pakai = jumlah kebutuhan, aset tidak habis pakai = jumlah 
      $table->string('kondisi');
      $table->enum('jenis_aset', ['habis_pakai', 'tidak_habis_pakai']);
      $table->timestamps();

      $table->foreign('cabor_id')->references('id')->on('cabor')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('inventaris');
  }
};
