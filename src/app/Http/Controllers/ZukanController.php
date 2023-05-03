<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use Illuminate\Http\Request;

class ZukanController extends Controller
{
  public function index(){
    $pokemons = Pokemon::all();
    return view('zukan.index', compact('pokemons'));
  }

  public function show($id){
    $pokemon = Pokemon::with('pokemon_type.type')->find($id);
    return view('zukan.show', compact('pokemon'));
  }
}
