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
    Schema::create('pelatih', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cabor_id');
      $table->string('nama_pelatih');
      $table->string('nomor_sertifikasi');
      $table->string('foto_sertifikasi');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');
      $table->timestamps();

      $table->foreign('cabor_id')->references('id')->on('cabor')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('pelatih');
  }
};
