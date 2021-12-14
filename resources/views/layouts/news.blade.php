@extends('layouts.app')

@section('content')
  <div class="content-middle">
    <div class="content-head__container">
      <div class="content-head__title-wrap">
        <div class="content-head__title-wrap__title bcg-title">Новости</div>
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
      <div class="news-list__container">
        @foreach($news as $element)
          <div class="news-list__item">
            <div class="news-list__item__thumbnail"><img src="img/news/ps_vr.jpg"></div>
            <div class="news-list__item__content">
              <div class="news-list__item__content__news-title">{{ $element->title}}</div>
              <div class="news-list__item__content__news-date">{{ date('d.m.Y', strtotime($element->created_at)) }}</div>
              <div class="news-list__item__content__news-content">
                {{ $element->description}}
              </div>
            </div>
            <div class="news-list__item__content__news-btn-wrap"><a href="{{ route('news-detail', $element->id) }}" class="btn btn-brown">Подробнее</a></div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
@endsection