<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SessionController as Session;
use App\Http\Controllers\ZukanController as Zukan;
use App\Http\Controllers\PokemonController as Pokemon;
use App\Http\Controllers\MyPokemonController as MyPokemon;
use App\Http\Controllers\GoToGetController as GoToGet;


//ログイン
Route::get('/login', [Session::class, 'index'])->name('session.index');
Route::post('/login', [Session::class, 'create'])->name('session.create');

Route::group(['middleware' => ['auth']], static function(){
  //図鑑
  Route::get('/', [Zukan::class, 'index'])->name('index');//TOPページ
  Route::get('/detail/{id}', [Zukan::class, 'show'])->name('show');//詳細ページ
  Route::get('/get_pokemon_data', [Pokemon::class, 'get'])->name('get_pokemon_data');//ポケモンデータの取得

  //Myポケモン
  Route::get('/my_pokemon', [MyPokemon::class, 'index'])->name('my_pokemon.index');//TOPページ

  //捕まえに行く
  Route::get('/go_to_get', [GoToGet::class, 'index'])->name('go_to_get.index');//TOPページ
  Route::post('/go_to_get/throw_ball', [GoToGet::class, 'throw_ball'])->name('go_to_get.throw_ball');//ボールを投げる



  //ログアウト
  Route::get('/logout', [Session::class, 'destroy'])->name('session.destroy');

});
