<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PokemonType extends Model
{
    use HasFactory;

    protected $fillable = [
      'pokemon_id',//ポケモンのID
      'type_id',//タイプのID
    ];


  public function type(): HasOne
  {
    return $this->hasOne(Type::class, 'id', 'type_id');
  }

  public function pokemon(): BelongsTo
  {
    return $this->belongsTo(Pokemon::class, 'id', 'pokemon_id');
  }
}
