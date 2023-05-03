<header id="header" class="w-100 d-flex bg-white text-black text-center p-2">
  <img class="w-auto h-100" src="{{ url('/assets/img/logo.png') }}" alt="ロゴ">

  @if(Auth::check())
  <nav>
    <ul id="g-navi">
      <li>
        <a href="{{ route('index') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto my-0" src="{{ url('/assets/img/ball.png') }}" alt="図鑑" />
            <span class="nav-text d-block mt-2">図鑑</span>
          </div>
        </a>
      </li>

      @if(Request::is('/'))
      <li id="get_data_button">
        <a href="{{ route('get_pokemon_data') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto my-0" src="{{ url('/assets/img/masterball.png') }}" alt="データを取得" />
            <span class="nav-text d-block mt-2">データを取得</span>
          </div>
        </a>
      </li>
      @endif

      <li class="ms-4">
        <a href="{{ route('session.destroy') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto my-0" src="{{ url('/assets/img/logout.png') }}" alt="ログアウト" />
            <span class="nav-text d-block mt-2">ログアウト</span>
          </div>
        </a>
      </li>
    </ul>
  </nav>
  @endif
</header>