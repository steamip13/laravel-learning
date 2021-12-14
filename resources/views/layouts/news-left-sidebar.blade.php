<div class="sidebar-item">
  <div class="sidebar-item__title">Последние новости</div>
  <div class="sidebar-item__content">
    <div class="sidebar-news">
      @foreach ($lastNews as $element)
        <div class="sidebar-news__item">
          <div class="sidebar-news__item__preview-news"><img src="/img/cover/game-2.jpg" alt="image-new" class="sidebar-new__item__preview-new__image"></div>
          <div class="sidebar-news__item__title-news"><a href="{{ route('news-detail', $element->id) }}" class="sidebar-news__item__title-news__link">{{ $element->title }}</a></div>
        </div>
      @endforeach
    </div>
  </div>
</div>