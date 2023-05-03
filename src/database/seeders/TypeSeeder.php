<?php

namespace Database\Seeders;

use App\Models\Type;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('types')->truncate();

      Type::insert([
        [
          'name' => 'ノーマル',
          'icon_path' => 'assets/img/pokemon_types/normal.svg'
        ],
        [
          'name' => 'ほのお',
          'icon_path' => 'assets/img/pokemon_types/honoo.svg'
        ],
        [
          'name' => 'みず',
          'icon_path' => 'assets/img/pokemon_types/mizu.svg'
        ],
        [
          'name' => 'くさ',
          'icon_path' => 'assets/img/pokemon_types/kusa.svg'
        ],
        [
          'name' => 'でんき',
          'icon_path' => 'assets/img/pokemon_types/denki.svg'
        ],
        [
          'name' => 'こおり',
          'icon_path' => 'assets/img/pokemon_types/koori.svg'
        ],
        [
          'name' => 'かくとう',
          'icon_path' => 'assets/img/pokemon_types/kakutou.svg'
        ],
        [
          'name' => 'どく',
          'icon_path' => 'assets/img/pokemon_types/doku.svg'
        ],
        [
          'name' => 'じめん',
          'icon_path' => 'assets/img/pokemon_types/zimen.svg'
        ],
        [
          'name' => 'ひこう',
          'icon_path' => 'assets/img/pokemon_types/hikou.svg'
        ],
        [
          'name' => 'エスパー',
          'icon_path' => 'assets/img/pokemon_types/esper.svg'
        ],
        [
          'name' => 'むし',
          'icon_path' => 'assets/img/pokemon_types/mushi.svg'
        ],
        [
          'name' => 'いわ',
          'icon_path' => 'assets/img/pokemon_types/iwa.svg'
        ],
        [
          'name' => 'ゴースト',
          'icon_path' => 'assets/img/pokemon_types/ghost.svg'
        ],
        [
          'name' => 'ドラゴン',
          'icon_path' => 'assets/img/pokemon_types/dragon.svg'
        ],
        [
          'name' => 'あく',
          'icon_path' => 'assets/img/pokemon_types/aku.svg'
        ],
        [
          'name' => 'はがね',
          'icon_path' => 'assets/img/pokemon_types/hagane.svg'
        ],
        [
          'name' => 'フェアリー',
          'icon_path' => 'assets/img/pokemon_types/fairy.svg'
        ],
      ]);
    }
}
