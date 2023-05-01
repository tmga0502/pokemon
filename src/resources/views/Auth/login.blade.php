@extends('layouts.main')

@section('content')

  @include('layouts.header')

    <div class="row mt-5">
      <div class="col-10 offset-1 col-md-8 offset-md-2 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
        <div class="card">
          <div class="card-body p-0">
            <div class="p-5 m-xl-3">
              <h5 class="text-center">会員ログイン</h5>
              <hr class="mb-5">
              @if(session('error_msg'))
                <div class="col-sm-12">
                  <p class="text-center text-danger">
                    {{session('error_msg')}}
                  </p>
                </div>
              @endif
              <form class="user" action="{{ route('session.create') }}" method="POST">
                @csrf
                <div class="form-group mb-4">
                  <label class="control-label" for="email">メールアドレス</label>
                  <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" />
                  @error('email')
                  <p class="text-danger mt-0">{{  $message }}</p>
                  @enderror
                </div>

                <div class="form-group">
                  <label class="control-label" for="password">パスワード</label>
                  <input type="password" id="password" class="form-control" name="password" />
                  @error('password')
                  <p class="text-danger mt-0">{{  $message }}</p>
                  @enderror
                </div>
                <div class="text-center mt-5">
                  <button type="submit" class="btn btn-danger rounded-pill w-50">ログイン</button>
                </div>
              </form>

              <div class="mt-5 text-center">
                <p class="m-0 d-lg-none">
                  <a href="">新規登録はこちら</a>
                </p>
              </div>

            </div>
          </div>
        </div>
      </div>

    </div>



@endsection