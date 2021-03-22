 <header>
  <h1 class="header_title">
      <a href="{{ url('/list') }}">KiNtai</a>
  </h1>
 <nav>
  <ul>
  @if (Route::has('login'))
    <div class="top-right links">
      @auth
        <li class="header_item">
          <!-- <a href="{{ url('/list') }}">HOME</a> -->
          <select class="select_box" name="" id="">
            <option value="">トップページ</option>
            <option value="">マイページ</option>
            <option value="">ログアウト</option>
          </select>
        </li>
        @else
        <li class="header_item">
          <a href="{{ route('login') }}">ログイン</a>
        </li>
        <!-- @if (Route::has('register'))
        <li class="header_item">
          <a href="{{ route('register') }}">新規登録</a>
        </li>
        @endif -->
      @endauth
    </div>
  @endif
    <!-- <li class="header_item"><a href=""></a>ログイン</li>
    <li class="header_item"><a href=""></a>新規登録</li> -->
  </ul>
 </nav>
 
 </header>
 