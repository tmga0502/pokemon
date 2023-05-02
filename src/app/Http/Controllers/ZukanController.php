<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ZukanController extends Controller
{
  public function index(){
    return view('zukan.index');
  }

  public function show($id){
    return view('zukan.show', compact('id'));
  }
}
