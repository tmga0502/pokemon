@extends('layouts.main')

@section('content')

  @include('layouts.header')

  <div class="container mt-5">

    <div class="row">
      <div class="col-12">
        <h2>
          @isset($message)
            {{ $message }}
          @else
            {{ $pokemon->name }}があらわれた
          @endisset
        </h2>
      </div>
    </div>

    <div class="row">
      <div class="col-12">
            <img class="mx-auto" src="{{ $pokemon->image_path }}" alt="{{ $pokemon->name }}"/>
      </div>
    </div>

    <div class="row mt-5">
      <div class="col-12 text-center">
        <form action="{{ route('go_to_get.throw_ball') }}" method="POST">
          @csrf
          <input type="hidden" name="pokemon_id" value="{{ $pokemon->id }}"/>
          <input type="hidden" name="probability" value="{{ $probability }}" />
          <button class="btn btn-lg btn-danger rounded-pill ">ボールを投げる</button>
        </form>
      </div>
    </div>

  </div>

@endsection