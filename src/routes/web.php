<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\SessionController as Session;
use App\Http\Controllers\HomeController as Home;


//ログイン
Route::get('/login', [Session::class, 'index'])->name('session.index');
Route::post('/login', [Session::class, 'create'])->name('session.create');

Route::group(['middleware' => ['auth']], static function(){
  //HOME
  Route::get('/', [Home::class, 'index'])->name('index');//TOPページ


  //マイページ
//  Route::prefix('/my_page')->name('my_page.')->group(static function () {
//    Route::get('/', [SettingIndex::class, 'index'])->name('index');
//  });

  //ログアウト
  Route::get('/logout', [Session::class, 'destroy'])->name('session.destroy');

});
