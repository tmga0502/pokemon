<?php

namespace App\Http\Controllers;
use App\Models\MyPokemon;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class MyPokemonController extends Controller
{
    public function index() :View
    {
      $pokemons = MyPokemon::with('pokemon')->groupBy('pokemon_id')->get(['pokemon_id']);
      return view('my_pokemon.index', compact('pokemons'));
    }
}
