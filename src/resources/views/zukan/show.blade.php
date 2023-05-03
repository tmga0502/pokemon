@extends('layouts.main')

@section('content')

  @include('layouts.header')

  <div class="container-sm my-5">

    <div class="row">
      <div class="col-12 col-md-6 pt-5">
        <img class="img-fluid mx-auto" src="{{ $pokemon->image_path }}" alt="{{ $pokemon->name }}" />
      </div>

      <div class="col-12 col-md-6 my-auto">
        <div class="card shadow h-100">
          <div class="card-body ">
            <p class="pokemon_number">No.{{ sprintf('%04d', $pokemon->number) }}</p>
            <p class="pokemon_name">{{ $pokemon->name }}</p>
          </div>
        </div>
      </div>
    </div>


    <div class="row">

      <div class="col-12 col-md-6 pt-5">
        <div class="card shadow h-100">
          <div class="card-body p-5">
            <dl>
              <dt class="d-inline-block">分類：</dt>
              <dd class="d-inline-block">{{ $pokemon->classification }}</dd>
            </dl>

            <dl class="poke-dl">
              <dt>タイプ：</dt>
              <dd>
                @foreach($pokemon->pokemon_type as $pokemon_type)
                  <div class="d-inline-block text-center">
                    <img  src="{{ url($pokemon_type->type->icon_path) }}">
                    <span>{{ $pokemon_type->type->name }}</span>
                  </div>
                @endforeach
              </dd>
            </dl>

            <dl>
              <dt class="d-inline-block">高さ：</dt>
              <dd class="d-inline-block">{{ $pokemon->height }}m</dd>
            </dl>

            <dl>
              <dt class="d-inline-block">重さ：</dt>
              <dd class="d-inline-block">{{ $pokemon->weight }}kg</dd>
            </dl>

            <dl>
              <dt class="d-inline-block">特性：</dt>
              <dd class="d-inline-block">{{ $pokemon->ability }}</dd>
            </dl>

            <dl class="poke-dl">
              <dt>説明：</dt>
              <dd>{!! nl2br($pokemon->description) !!}</dd>
            </dl>

          </div>
        </div>
      </div>

      <div class="col-12 col-md-6 pt-5">
        <div class="card shadow h-100">
          <div class="card-body p-5">
            <dl>
              <dt class="d-inline-block">HP</dt>
              <dd class="d-inline-block w-100">
                <div class="progress">
                  <div class="progress-bar bg-danger"
                       role="progressbar"
                       style="width: {{ $pokemon->hp / 255 * 100 }}%;"
                       aria-valuenow={{ $pokemon->hp / 255 * 100 }}
                       aria-valuemin="0"
                       aria-valuemax="100">
                    {{ $pokemon->hp }}
                  </div>
                </div>
              </dd>
            </dl>

            <dl>
              <dt class="d-inline-block">こうげき</dt>
              <dd class="d-inline-block w-100">
                <div class="progress">
                  <div class="progress-bar bg-danger"
                       role="progressbar"
                       style="width: {{ $pokemon->attack / 255 * 100 }}%;"
                       aria-valuenow={{ $pokemon->attack / 255 * 100 }}
                       aria-valuemin="0"
                       aria-valuemax="100">
                    {{ $pokemon->attack }}
                  </div>
                </div>
              </dd>
            </dl>

            <dl>
              <dt class="d-inline-block">ぼうぎょ：</dt>
              <dd class="d-inline-block w-100">
                <div class="progress">
                  <div class="progress-bar bg-danger"
                       role="progressbar"
                       style="width: {{ $pokemon->defense / 255 * 100 }}%;"
                       aria-valuenow={{ $pokemon->defense / 255 * 100 }}
                       aria-valuemin="0"
                       aria-valuemax="100">
                    {{ $pokemon->defense }}
                  </div>
                </div>
              </dd>
            </dl>

            <dl>
              <dt class="d-inline-block">とくこう：</dt>
              <dd class="d-inline-block w-100">
                <div class="progress">
                  <div class="progress-bar bg-danger"
                       role="progressbar"
                       style="width: {{ $pokemon->special_attack / 255 * 100 }}%;"
                       aria-valuenow={{ $pokemon->special_attack / 255 * 100 }}
                       aria-valuemin="0"
                       aria-valuemax="100">
                    {{ $pokemon->special_attack }}
                  </div>
                </div>
              </dd>
            </dl>

            <dl>
              <dt class="d-inline-block">とくぼう：</dt>
              <dd class="d-inline-block w-100">
                <div class="progress">
                  <div class="progress-bar bg-danger"
                       role="progressbar"
                       style="width: {{ $pokemon->special_defense / 255 * 100 }}%;"
                       aria-valuenow={{ $pokemon->special_defense / 255 * 100 }}
                       aria-valuemin="0"
                       aria-valuemax="100">
                    {{ $pokemon->special_defense }}
                  </div>
                </div>
              </dd>
            </dl>

            <dl>
              <dt class="d-inline-block">すばやさ：</dt>
              <dd class="d-inline-block w-100">
                <div class="progress">
                  <div class="progress-bar bg-danger"
                       role="progressbar"
                       style="width: {{ $pokemon->speed / 255 * 100 }}%;"
                       aria-valuenow={{ $pokemon->speed / 255 * 100 }}
                       aria-valuemin="0"
                       aria-valuemax="100">
                    {{ $pokemon->speed }}
                  </div>
                </div>
              </dd>
            </dl>

          </div>
        </div>
      </div>
    </div>

  </div>

@endsection()