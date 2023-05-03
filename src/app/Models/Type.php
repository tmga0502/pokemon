<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $name)
 * @method static insert(\string[][] $array)
 */
class Type extends Model
{
    use HasFactory;

    protected $fillable = [
      'name',//タイプ名
      'color'//タイプの色
    ];

  public function pokemon_type(): HasOne
  {
    return $this->hasOne(PokemonType::class, 'type_id', 'id');
  }
}
