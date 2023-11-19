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
    Schema::create('anggota', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cabor_id');
      $table->string('nama');
      $table->string('tempat_lahir');
      $table->date('tanggal_lahir');

      // untuk pelatih
      $table->string('nomor_sertifikasi')->nullable();
      $table->string('foto_sertifikasi')->nullable();

      // untuk atlet
      $table->string('nomor_kta')->nullable();
      $table->string('sekolah_pt')->nullable();

      $table->enum('jenis', ['pelatih', 'atlet']);
      $table->timestamps();

      $table->foreign('cabor_id')->references('id')->on('cabor')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('anggota');
  }
};
