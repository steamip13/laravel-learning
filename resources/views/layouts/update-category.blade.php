@extends('layouts.app')

@section('content')
<form action="{{ route('category-update-submit', $category->id) }}" method="post">

    @csrf
    <div class="form-group mb-3">
        <label for="title">Введите название категории</label>
        <input type="text" value="{{ $category->title }}" name="title" placeholder="Введите название категории" id="title" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="description">Введите описание категории</label>
        <input type="text" value="{{ $category->description }}" name="description" placeholder="Введите описание категории" id="description" class="form-control">
    </div>
    <button type="submit" class="">Обновить</button>
</form>
@endsection
