<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\SessionRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SessionController extends Controller
{
    public function index(){
      return view('auth.login');
    }

  /**
   * @param SessionRequest $req
   * @return RedirectResponse
   */
    public function create(SessionRequest $req): RedirectResponse
    {
      if(Auth::attempt($req->only('email', 'password'))){
        //ログイン
        return redirect()->route('index');
      }

      return redirect()->back()->withInput()->with('error_msg', 'ログインIDかパスワードが間違っています。');
    }


  /**
   * Remove the specified resource from storage.
   *
   * @return RedirectResponse
   */
  public function destroy(): RedirectResponse
  {
    Auth::logout();
    return redirect()->route('session.index');
  }
}
