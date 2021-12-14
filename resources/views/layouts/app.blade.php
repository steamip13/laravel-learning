<!DOCTYPE html>
<html lang="ru">
  <head>
    <title>main - ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link rel="stylesheet" href="/css/libs.min.css">
    <link rel="stylesheet" href="/css/main.css">
    <link rel="stylesheet" href="/css/media.css">
  </head>
  <body>
    <div class="main-wrapper">
      @include('layouts.header')
      <div class="middle">
        <div class="sidebar">
          @include('layouts.categories')
          @include('layouts.news-left-sidebar')
        </div>
        <div class="main-content">
          <div class="content-top">
            <h3 class="content-top__text">Купить игры неборого без регистрации смс с торента, получить компкт диск, скачать Steam игры после оплаты</h3>
            <div class="slider"><img src="/img/slider.png" alt="Image" class="image-main"></div>
          </div>
          @yield('content')
          <div class="content-bottom">
            @yield('content-bottom')
          </div>
        </div>
      </div>
      @include('layouts.footer')
    </div>
    <script src="/js/main.js"></script>
  </body>
</html>