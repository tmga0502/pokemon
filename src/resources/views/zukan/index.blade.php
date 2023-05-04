@extends('layouts.main')

@section('content')

  @include('layouts.header')

  <div class="container">

    <div class="row">
      <div class="col-12">
        <div id="modalOpen" class="poke-search my-4 text-center">
          <img class="nav-image"
               src="./assets/img/search.png"
               alt="search_icon">
          <span>検索</span>
        </div>
      </div>
    </div>

    <div id="poke_area" class="row">
      @empty($pokemons[0])
        <div class="col-12 text-center">「データ取得」よりデータを取得してください。</div>
      @endempty
      @foreach($pokemons as $pokemon)
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 poke_col">
          <a href="{{ route('show', ['id'=>$pokemon->id]) }}" class="poke_link" data-id="{{ $pokemon->id }}" data-name="{{ $pokemon->name }}">
            <div class="poke_box p-2">
              <div class=w-100">
                <img src="{{ $pokemon->image_path }}" alt="{{ $pokemon->name }}"/>
              </div>
            </div>
            <div class="text-center">
              <p class="mt-0 mb-5">{{ $pokemon->name }}</p>
            </div>
          </a>
        </div>
      @endforeach

    </div>

    <div class="row mb-5">
      <div class="col-12">
        <div class="mt-1 mb-1 row justify-content-center">
          {{ $pokemons->links() }}
        </div>
      </div>
    </div>

{{--    <div id="more_pokemon_btn" class="row mb-5 d-none">--}}
{{--      <div class="col-12 text-center">--}}
{{--        <button class="btn btn-outline-danger btn-sm w-50 rounded-pill">更に読み込む</button>--}}
{{--      </div>--}}
{{--    </div>--}}

  </div>

  @include('zukan.index_items.modal')
  @include('zukan.index_items.loader')

@endsection