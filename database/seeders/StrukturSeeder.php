<?php

namespace Database\Seeders;

use App\Models\Struktur;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StrukturSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    Struktur::create([
      'cabor_id' => 1,
      'nama_pengurus' => 'Raditya Manohara',
      'Jabatan' => 'Ketua',
    ]);
    Struktur::create([
      'cabor_id' => 1,
      'nama_pengurus' => 'Asep Jayadi',
      'Jabatan' => 'Wakil Ketua',
    ]);
    Struktur::create([
      'cabor_id' => 2,
      'nama_pengurus' => 'Hokky Aryasta',
      'Jabatan' => 'Ketua',
    ]);
    Struktur::create([
      'cabor_id' => 2,
      'nama_pengurus' => 'Sandhika Galih',
      'Jabatan' => 'Wakil Ketua',
    ]);
  }
}
