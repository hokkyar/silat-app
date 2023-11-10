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

  public function pelatih()
  {
    return $this->hasMany(Pelatih::class, 'cabor_id', 'id');
  }

  public function atlet()
  {
    return $this->hasMany(Atlet::class, 'cabor_id', 'id');
  }

  public function prestasi()
  {
    $this->belongsTo(Prestasi::class, 'cabor_id', 'id');
  }

  public function program()
  {
    $this->belongsTo(Program::class, 'cabor_id', 'id');
  }
}
