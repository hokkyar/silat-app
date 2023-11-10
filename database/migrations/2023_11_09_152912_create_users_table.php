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
    Schema::create('users', function (Blueprint $table) {
      $table->id();
      $table->string('username')->unique();
      $table->string('password');
      $table->enum('role', ['admin', 'pengurus']);
      $table->unsignedBigInteger('cabor_id')->nullable();
      $table->timestamps();

      $table->foreign('cabor_id')->references('id')->on('cabor')->onDelete('cascade')->onUpdate('cascade');
    });
  }

  /**
   * Reverse the migrations.
   */
  public function down(): void
  {
    Schema::dropIfExists('users');
  }
};
