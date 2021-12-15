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
    <div class="cart-product-list">
        @forelse ($goods as $item)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="/img/cover/game-{{ $item->getRandomId() }}.jpg" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="{{ route('buy', $item->id) }}">{{ $item->title }}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{ $item->created_at->format('d.m.Y') }}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{ $item->price }} рублей</span></div>
            </div>
        @empty
            Нет товаров в заказе
        @endforelse
        <div class="cart-product-list__result-item">
            <div class="cart-product-list__result-item__text">Итого</div>
            <div class="cart-product-list__result-item__value">{{ $sum }} рублей</div>
        </div>
    </div>
    <div class="content-footer__container">
        @if ($goods)
            <div class="btn-buy-wrap"><a href="{{ route('order-process') }}" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div>
        @endif
    </div>
@endsection