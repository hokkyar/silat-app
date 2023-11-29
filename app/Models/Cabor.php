<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cabor extends Model
{
  use HasFactory;
  protected $table = 'cabor';
  protected $guarded = ['id'];

  public function user()
  {
    return $this->hasMany(User::class, 'cabor_id', 'id');
  }

  public function struktur()
  {
    return $this->hasMany(Struktur::class, 'cabor_id', 'id');
  }

  public function inventaris()
  {
    return $this->hasMany(Inventaris::class, 'cabor_id', 'id');
  }

  public function anggota()
  {
    return $this->hasMany(Anggota::class, 'cabor_id', 'id');
  }

  public function prestasi()
  {
    return $this->hasMany(Prestasi::class, 'cabor_id', 'id');
  }

  public function program()
  {
    return $this->hasMany(Program::class, 'cabor_id', 'id');
  }
}
