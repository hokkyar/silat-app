<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
  /**
   * Run the database seeds.
   */
  public function run(): void
  {
    User::create([
      'username' => 'admin',
      'password' => Hash::make('123'),
      'role' => 'admin',
      'cabor_id' => null,
    ]);
    User::create([
      'username' => 'raditya',
      'password' => Hash::make('123'),
      'role' => 'pengurus',
      'cabor_id' => 1,
    ]);
    User::create([
      'username' => 'hokky',
      'password' => Hash::make('123'),
      'role' => 'pengurus',
      'cabor_id' => 2,
    ]);
  }
}
