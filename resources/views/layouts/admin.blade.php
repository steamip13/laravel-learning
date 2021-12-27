@extends('layouts.app')

@section('content')
  <nav class="main-navigation">
    <ul class="nav-list nav-list--custom">
      <li class="nav-list__item"><a href="{{ route('admin-categories') }}" class="nav-list__item__link">Категории</a></li>
      <li class="nav-list__item"><a href="{{ route('admin-goods') }}" class="nav-list__item__link">Товары</a></li>
      <li class="nav-list__item"><a href="{{ route('orderAdmin') }}" class="nav-list__item__link">Заказы</a></li>
    </ul>
  </nav>
@endsection