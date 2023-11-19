<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
  use HasFactory;
  protected $table = 'anggota';
  protected $guarded = ['id'];

  public function cabor()
  {
    return $this->belongsTo(Cabor::class, 'cabor_id', 'id');
  }
}
