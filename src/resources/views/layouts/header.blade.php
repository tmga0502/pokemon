<header id="header" class="w-100 d-flex bg-white text-black text-center p-2">
  <a class="w-auto h-100" href="{{ route('index') }}">
    <img class="header-logo h-100" src="{{ url('/assets/img/logo.png') }}" alt="ロゴ">
  </a>


  <div class="open_btn d-block d-md-none"><span></span><span>Menu</span><span></span></div>

  <nav id="g-nav">
    <div id="g-nav-list"><!--ナビの数が増えた場合縦スクロールするためのdiv※不要なら削除-->
      <ul>
        <li><a href="{{ route('index') }}">ポケモン図鑑</a></li>
        <li><a href="#">捕まえに行く</a></li>
        <li><a href="#">My図鑑</a></li>
        <li><a href="{{ route('get_pokemon_data') }}">データを取得</a></li>
        <li class="mt-5"><a href="{{ route('session.destroy') }}">ログアウト</a></li>
      </ul>
    </div>
  </nav>

  @if(Auth::check())
  <nav class="d-none d-md-block">
    <ul>
      <li>
        <a href="{{ route('index') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto my-0" src="{{ url('/assets/img/ball.png') }}" alt="図鑑" />
            <span class="nav-text d-block mt-2">ポケモン図鑑</span>
          </div>
        </a>
      </li>

      <li>
        <a href="{{ route('index') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto" src="{{ url('/assets/img/map.png') }}" alt="マップ" />
            <span class="nav-text d-block mt-2">捕まえに行く</span>
          </div>
        </a>
      </li>

      <li>
        <a href="{{ route('index') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto" src="{{ url('/assets/img/my_zukan.png') }}" alt="マップ" />
            <span class="nav-text d-block mt-2">My図鑑</span>
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
