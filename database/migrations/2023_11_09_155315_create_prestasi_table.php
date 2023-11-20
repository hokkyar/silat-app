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
    Schema::create('prestasi', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cabor_id');
      $table->string('nama_kejuaraan');
      $table->date('tanggal');
      $table->string('sertifikat')->nullable(); // apanya?? gambar/nomor?? 
      $table->string('prestasi')->nullable(); // prestasi/medali?
      $table->string('foto')->nullable();
      $table->text('deskripsi')->nullable();
      $table->timestamps();

      $table->foreign('cabor_id')->references('id')->on('cabor')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('prestasi');
  }
};
