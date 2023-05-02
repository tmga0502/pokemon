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

  </div>

  @include('home.index_items.modal')

@endsection