<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atlet extends Model
{
  use HasFactory;
  protected $table = 'atlet';
  protected $guarded = ['id'];

  public function cabor()
  {
    $this->belongsTo(Cabor::class, 'cabor_id', 'id');
  }
}
