<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>ecsite</title>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.8.2/jquery.min.js"></script>
    {{Html::style('css/style.css')}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/css/swiper.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/vue/1.0.28/vue.min.js" charset="utf-8"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.3.1/js/swiper.min.js"></script>
</head>

<body>
    <div class="sidebar">
        <li>カテゴリ</li>
        <li>ランキング</li>
        <li id="mypage">カート</li><script type="text/javascript">
          $('#mypage').click(function(){
            location.href = '/cart';
          });
        </script>
        <li>ブックマーク</li>
    </div>

    <header>

      @if (Auth::guest())
      @else
      <script>$(function(){$('.swap').css('display','none')});</script>
      <a href="{{ url('/logout') }}"
          onclick="event.preventDefault();
                   document.getElementById('logout-form').submit();" style="position:absolute; font-size:20px; margin-right:4%; right:0; color:black; z-index:1;" >
          Logout
      </a>
      <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
          {{ csrf_field() }}
      </form>
      @endif

        <div class="login">
            <a href="/login" class="swap">sign in</a>
            <a href="/register" class="swap">sign up</a>
        </div>
        <input type="text" name="name" value="" id="value">
        <button type="button" name="button" id="submit_search">検索</button>
    </header>
    <!-- Slider main container -->
  <div class="swiper-container">
  <!-- Additional required wrapper -->
  <div class="swiper-wrapper">
  <!-- Slides -->
  <div class="swiper-slide">{{Html::image('img/0001.jpg')}}</div>
  <div class="swiper-slide">{{Html::image('img/001.jpg')}}</div>
  <div class="swiper-slide">{{Html::image('img/105.jpg')}}</div>
  </div>
  <!-- ページネーション -->
  <div class="swiper-pagination"></div>

  <!-- ナビゲーションボタン -->
  <div class="swiper-button-prev"></div>
  <div class="swiper-button-next"></div>
  </div>

    <div class="shadow">
    </div>
    <div class="header_bottom">
    </div>

    <div id="vue_el">
      <div class='products'>
        <div v-for="nuko in nukos" class="product_css@{{($index+1)%5}}">
          <img src="/img/@{{nuko.pass}}" alt="" />
          <a href="/detail?id=@{{$index+1}}">@{{nuko.name}}</a>
          <br>
          <br>
          <br>
          <p>
            @{{nuko.comment}}
            <br>
          </p>
          <h2>@{{nuko.price}}</h2>
        </div>
      </div>
    </div>
{{HTML::script('js/swiper.js')}}
{{HTML::script('js/vue.js')}}
</body>
</html>
