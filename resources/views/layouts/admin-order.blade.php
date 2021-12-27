@extends('layouts.app')

@section('content')
    <div class="content-main__container">
      <div class="cart-product-list">
        @php
          $i = 1;
        @endphp
        <div class="admin-block-container">
          <h2>Список всех заказов</h2>
          <a class="back-link" href="{{ route('admin') }}">Назад</a>
        </div>
        <h2>Текущие заказы</h2>
        @foreach ($orderCurrent as $order)
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

        @php
          $i = 1;
        @endphp
        <h2>Завершенные заказы</h2>
        @foreach ($orderProcessed as $order)
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