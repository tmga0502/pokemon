<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SessionController as Session;
use App\Http\Controllers\ZukanController as Zukan;


//ログイン
Route::get('/login', [Session::class, 'index'])->name('session.index');
Route::post('/login', [Session::class, 'create'])->name('session.create');

Route::group(['middleware' => ['auth']], static function(){
  //図鑑
  Route::get('/', [Zukan::class, 'index'])->name('index');//TOPページ
  Route::get('/detail/{id}', [Zukan::class, 'show'])->name('show');//詳細ページ


  //マイページ
//  Route::prefix('/my_page')->name('my_page.')->group(static function () {
//    Route::get('/', [SettingIndex::class, 'index'])->name('index');
//  });

  //ログアウト
  Route::get('/logout', [Session::class, 'destroy'])->name('session.destroy');

});
