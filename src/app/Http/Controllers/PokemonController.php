<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonType;
use App\Models\Type;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\RedirectResponse;
use JsonException;

class PokemonController extends Controller
{
  /**
   * @throws JsonException|GuzzleException
   */
  public function get(): RedirectResponse
  {
      //①現在DBに登録されているポケモンの数を取得
      $pokemon_count = Pokemon::count();

      //Guzzleをインスタンス化
      $client = new Client();

      //①に+1した数から50匹分のポケモンをAPIから取得
      $insert_array = [];
      for($i=$pokemon_count+1; $i<$pokemon_count+51; $i++){
        try {
          $response = $client->request('GET', 'https://pokeapi.co/api/v2/pokemon/' . $i);
        } catch (GuzzleException $e) {
          //エラー時（すべてのポケモンを取得し終わった状態）
          return redirect()->back();
        }
        $data = json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        //日本語で諸々を取得
        $species = $client->request('GET', $data['species']['url']);
        $species_data = json_decode($species->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        $ja_name = $this->getProps($species_data['names'], 'name');//名前の取得
        $ja_classification = $this->getProps($species_data['genera'], 'genus');//分類の取得
        $ability = $this->getAbility($data['abilities'][0]);//特性の取得
        $description = $this->getProps($species_data['flavor_text_entries'], 'flavor_text');//説明文の取得

        //typeの登録
        $this->getAndCreateTypes($data);

        //$pokemon_arrayに入れていく
        $pokemon_array = [
          'number'  => $data['id'],
          'name' => $ja_name,
          'image_path' => $data['sprites']['other']['official-artwork']['front_default'],
          'classification' => $ja_classification,
          'height' => $data['height'] / 10,
          'weight' => $data['weight'] / 10,
          'ability' => $ability,
          'hp' => $data['stats'][0]['base_stat'],
          'attack' => $data['stats'][1]['base_stat'],
          'defense' => $data['stats'][2]['base_stat'],
          'special_attack' => $data['stats'][3]['base_stat'],
          'special_defense' => $data['stats'][4]['base_stat'],
          'speed' => $data['stats'][5]['base_stat'],
          'description' => $description,
        ];

        //insert_arrayに入れる
        $insert_array[] = $pokemon_array;
      }

      //Pokemonテーブルに保存
      Pokemon::insert($insert_array);

      return redirect()->back();
    }



  private function getProps($array, $get_key){
    foreach ($array as $species){
      if($species['language']['name'] === 'ja-Hrkt'){
        $result = $species[$get_key];
        break;
      }
    }
    return $result;
  }


  /**
   * @throws GuzzleException
   * @throws JsonException
   */
  private function getAbility($ability_array)
  {
    $client = new Client();
    $response = $client->request('GET', $ability_array['ability']['url']);
    $ability_data= json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);
    return $this->getProps($ability_data['names'], 'name');
  }


  /**
   * @throws GuzzleException
   * @throws JsonException
   */
  private function getAndCreateTypes($pokemon_data): void
  {
    $insert_array = [];
    foreach($pokemon_data['types'] as $data){
      $client = new Client();
      $response = $client->request('GET', $data['type']['url']);
      $type_data= json_decode($response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

      $name = $this->getProps($type_data['names'], 'name');

      //TypeModelから該当データを取得
      $type = Type::where('name', $name)->first();

      //insert_arrayに追加
      $insert_array[] = [
        'pokemon_id' => $pokemon_data['id'],
        'type_id' => $type->id
      ];

    }

    //pokemon_typeに登録
    PokemonType::insert($insert_array);
  }
}
