<header id="header" class="w-100 d-flex bg-white text-black text-center p-2">
  <img class="w-auto h-100" src="./assets/img/logo.png" alt="ロゴ">

  @if(Auth::check())
  <nav>
    <ul id="g-navi">
      <li>
        <a href="">
          <div class="d-block">
            <img class="nav-image d-block mx-auto my-0" src="./assets/img/ball.png">
            <span class="nav-text d-block mt-2">図鑑</span>
          </div>
        </a>
      </li>

      <li class="ms-4">
        <a href="{{ route('session.destroy') }}">
          <div class="d-block">
            <img class="nav-image d-block mx-auto my-0" src="./assets/img/logout.png">
            <span class="nav-text d-block mt-2">ログアウト</span>
          </div>
        </a>
      </li>
    </ul>
  </nav>
  @endif
</header>