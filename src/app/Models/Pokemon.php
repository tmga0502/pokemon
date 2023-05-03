<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * @method static count()
 * @method static insert(array $insert_array)
 * @method static find($id)
 */
class Pokemon extends Model
{
    use HasFactory;

  protected $fillable = [
    'number',//図鑑ナンバー
    'name',//名前
    'image_path',//画像パス
    'classification',//分類
    'height',//高さ
    'weight',//重さ
    'characteristic',//特性
    'hp',//HP
    'attack',//こうげき
    'defense',//ぼうぎょ
    'special_attack',//とくこう
    'special_defense',//とくぼう
    'speed',//すばやさ
    'description',//紹介文
  ];

  public function pokemon_type(): HasMany
  {
    return $this->hasMany(PokemonType::class, 'pokemon_id', 'id');
  }

}
