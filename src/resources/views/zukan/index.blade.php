@extends('layouts.main')

@section('content')

  @include('layouts.header')

  <div class="container">

    <div class="row">
      <div id="modalOpen" class="poke-search my-4 text-center">
        <img class="nav-image"
             src="./assets/img/search.png"
             alt="search_icon">
        <span>検索</span>
      </div>
    </div>

    <div id="poke_area" class="row"></div>

    <div id="more_pokemon_btn" class="row mb-5 d-none">
      <div class="col-12 text-center">
        <button class="btn btn-outline-danger btn-sm w-50 rounded-pill">更に読み込む</button>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
        <div id="spinner">
          <div class="rect1"></div>
          <div class="rect2"></div>
          <div class="rect3"></div>
          <div class="rect4"></div>
          <div class="rect5"></div>
        </div>
      </div>
    </div>

  </div>

  @include('zukan.index_items.modal')

@endsection