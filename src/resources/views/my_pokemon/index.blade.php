@extends('layouts.main')

@section('content')

  @include('layouts.header')

  <div class="container mt-5">

    <div class="row">
      <div class="col-12">
        <h2>
          捕まえたポケモン一覧
        </h2>
      </div>
    </div>

    <div id="poke_area" class="row">
      @empty($pokemons[0])
        <div class="col-12 text-center">捕まえたポケモンがいません</div>
      @endempty
      @foreach($pokemons as $pokemon)
        <div class="col-6 col-md-4 col-lg-3 col-xl-2 poke_col">
          <a href="{{ route('show', ['id'=>$pokemon->pokemon->id]) }}" class="poke_link" data-id="{{ $pokemon->pokemon->id }}" data-name="{{ $pokemon->pokemon->name }}">
            <div class="poke_box p-2">
              <div class=w-100">
                <img src="{{ $pokemon->pokemon->image_path }}" alt="{{ $pokemon->pokemon->name }}"/>
              </div>
            </div>
            <div class="text-center">
              <p class="mt-0 mb-5">{{ $pokemon->pokemon->name }}</p>
            </div>
          </a>
        </div>
      @endforeach

    </div>


  </div>

@endsection