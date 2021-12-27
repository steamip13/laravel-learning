@extends('layouts.app')

@section('content')
<form action="{{ route('good-update-submit', $good->id) }}" method="post">

    @csrf
    <div class="form-group mb-3">
        <label for="title">Введите название товара</label>
        <input type="text" value="{{ $good->title }}" name="title" placeholder="Введите название товара" id="title" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="description">Введите описание товара</label>
        <input type="text" value="{{ $good->description }}" name="description" placeholder="Введите описание товара" id="description" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="category_id">Введите id категории</label>
        <input type="text" value="{{ $good->category_id }}" name="category_id" placeholder="Введите id категории" id="category_id" class="form-control">
    </div>    <div class="form-group mb-3">
        <label for="price">Введите цену</label>
        <input type="text" value="{{ $good->price }}" name="price" placeholder="Введите цену" id="price" class="form-control">
    </div>
    <button type="submit" class="">Обновить</button>
</form>
@endsection
