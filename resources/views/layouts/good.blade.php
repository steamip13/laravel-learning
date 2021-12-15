@extends('layouts.app')

@section('content')
<div class="content-middle">
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">{{ $good->title }} в разделе {{ $good->category->title }}</div>
    </div>
    <div class="content-head__search-block">
      <div class="search-container">
        <form class="search-container__form">
          <input type="text" class="search-container__form__input">
          <button class="search-container__form__btn">search</button>
        </form>
      </div>
    </div>
  </div>
  <div class="content-main__container">
    <div class="product-container">
      <div class="product-container__image-wrap"><img src="/img/cover/game-{{ $good->getRandomId() }}.jpg" class="image-wrap__image-product"></div>
      <div class="product-container__content-text">
        <div class="product-container__content-text__title">{{ $good->title }}</div>
        <div class="product-container__content-text__price">
          <div class="product-container__content-text__price__value">
            Цена: <b>{{ $good->price }}</b>
            руб
          </div><a href="{{ route('buy', $good->id) }}" class="btn btn-blue">Купить</a>
        </div>
        <div class="product-container__content-text__description">
          {{ $good->description }}
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

@section('content-bottom')
<div class="line"></div>
<div class="content-head__container">
    <div class="content-head__title-wrap">
    <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
    </div>
</div>
<div class="content-main__container">
    <div class="products-columns">
        @foreach($goodsView as $good)
            <div class="products-columns__item">
                <div class="products-columns__item__title-product"><a href="{{ route('good', $good->id) }}" class="products-columns__item__title-product__link">{{ $good->title }}</a></div>
                <div class="products-columns__item__thumbnail"><a href="{{ route('good', $good->id) }}" class="products-columns__item__thumbnail__link"><img src="/img/cover/game-{{ $good->getRandomId() }}.jpg" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                <div class="products-columns__item__description"><span class="products-price">{{ $good->price }} руб</span><a href="{{ route('buy', $good->id) }}" class="btn btn-blue">Купить</a></div>
            </div>
        @endforeach
    </div>
</div>
@endsection