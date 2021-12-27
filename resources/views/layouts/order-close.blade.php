@extends('layouts.app')

@section('content')
  <div class="content-head__container">
    <div class="content-head__title-wrap">
      <div class="content-head__title-wrap__title bcg-title">Мои заказы</div>
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
    <div class="cart-product-list">
      @php
        $i = 1;
      @endphp
      @foreach ($orderAll as $order)
      <p>Заказ № {{ $i }}</p>
        @foreach ($order as $good)
          <div class="cart-product-list__item">
            <div class="cart-product__item__product-photo"><img src="/img/cover/game-{{ $good->getRandomId() }}.jpg" class="cart-product__item__product-photo__image"></div>
            <div class="cart-product__item__product-name">
              <div class="cart-product__item__product-name__content"><a href="{{ route('good', $good->id) }}">{{ $good->title }}</a></div>
            </div>
            <div class="cart-product__item__cart-date">
              <div class="cart-product__item__cart-date__content">{{ $good->created_at->format('d.m.Y') }}</div>
            </div>
            <div class="cart-product__item__product-price"><span class="product-price__value">{{ $good->price }} рублей</span></div>
          </div>
        @endforeach
        @php
          $i++;
        @endphp
      @endforeach
    </div>
  </div>
@endsection