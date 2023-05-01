@extends('layouts.main')

@section('content')

  @include('layouts.header')

  <div class="container">

    <div class="row">
      <div id="modalOpen" class="poke-search my-4 text-center">
        <img class="nav-image" src="./assets/img/search.png">
        <span>検索</span>
      </div>
    </div>

    <div class="row">
      <div class="col-6 col-md-4 col-lg-3 col-xl-2">
        <a href="" class="poke_link" data-id="1" data-name="フシギダネ">
          <div class="poke_box p-2">
            <div class=w-100">
              <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/1.png" alt="フシギダネ"/>
            </div>
          </div>
          <div class="text-center">
            <p>フシギダネ</p>
          </div>
        </a>
      </div>

      <div class="col-6 col-md-4 col-lg-3 col-xl-2">
        <a href="" data-id="2" data-name="フシギソウ">
          <div class="poke_box p-2">
            <div class="w-100">
              <img src="https://raw.githubusercontent.com/PokeAPI/sprites/master/sprites/pokemon/other/official-artwork/2.png" alt="フシギソウ"/>
            </div>
          </div>
          <div class="text-center">
            <p>フシギソウ</p>
          </div>
        </a>
      </div>
    </div>

  </div>

  @include('home.index_items.modal')

@endsection