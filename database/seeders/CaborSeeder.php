<?php

namespace Database\Seeders;

use App\Models\Cabor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CaborSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Cabor::create([
      'nama_cabor' => 'Bridge'
    ]);
    Cabor::create([
      'nama_cabor' => 'Sepak Bola'
    ]);
    Cabor::create([
      'nama_cabor' => 'Basket'
    ]);
    Cabor::create([
      'nama_cabor' => 'Tenis meja'
    ]);
  }
}
