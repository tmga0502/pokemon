<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class MyPokemon extends Model
{
    use HasFactory;

  protected $fillable = [
    'pokemon_id',//ポケモンID
  ];

  public function pokemon(): HasOne
  {
    return $this->hasOne(Pokemon::class, 'id', 'pokemon_id');
  }
}
