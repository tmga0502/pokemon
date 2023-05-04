<?php

namespace App\Http\Controllers;
use App\Models\MyPokemon;
use App\Models\Pokemon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class GoToGetController extends Controller
{
    public function index() :View
    {
      //ポケモンをランダムで1体取得
      $pokemon = Pokemon::inRandomOrder()->first();

      //Getできる確率を選択
      $probability_array = [10, 20, 30, 50];
      $key = array_rand($probability_array, 1);
      $probability = $probability_array[$key];

      return view('go_to_get.index', compact('pokemon', 'probability'));
    }


  /**
   * @param Request $req
   * @return void
   */
    public function throw_ball(Request $req){

      //get判定
      $isGet = $this->getJudge($req->probability);

      if($isGet){
        //捕まえる
        $my_pokemon = new MyPokemon([
          'pokemon_id' => $req->pokemon_id,
        ]);
        $my_pokemon->save();

        return redirect()->route('my_pokemon.index');
      }else{
        //もう一回
        $pokemon = Pokemon::find($req->pokemon_id);
        $probability = $req->probability;
        $message = '捕まえられなかった...';
        return view('go_to_get.index', compact('pokemon', 'probability', 'message'));
      }
    }



    private function getJudge($probability){
      //trueとfalseの配列を作る
      //例えば30%の確率でゲットできるのであれば、[true, false, false]という配列からランダムで1つ取得すればいい。
      $judge_array = $this->createJudgeArray($probability);
      $key = array_rand($judge_array, 1);

      return $judge_array[$key];
    }

    private function createJudgeArray($probability): array
    {
      $result = [];
      //配列の個数
      $count = floor( 100 / $probability);
      //1つだけtrueであとはfalse
      for($i=0; $i<$count; $i++){
        if($i === 0){
          $result[] = true;
        }else{
          $result[] = false;
        }
      }
      return $result;
    }
}
