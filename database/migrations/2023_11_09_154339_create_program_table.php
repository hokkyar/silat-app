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
    Schema::create('program', function (Blueprint $table) {
      $table->id();
      $table->unsignedBigInteger('cabor_id');
      $table->date('tanggal'); // latihan = hari/tanggal, kejuaraan = tahun, try_out = tahun
      $table->string('nama_program'); // latihan = program_latihan, kejuaraan = kejuaraan, try_out = program try out
      $table->string('lokasi')->nullable();
      $table->enum('jenis', ['latihan', 'kejuaraan', 'try_out']);
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
    Schema::dropIfExists('program');
  }
};
