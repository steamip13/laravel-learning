@extends('layouts.app')

@section('content')
<form action="{{ route('add-category-submit') }}" method="post">

    @csrf
    <div class="form-group mb-3">
        <label for="title">Введите название категории</label>
        <input type="text" value="" name="title" placeholder="Введите название категории" id="title" class="form-control">
    </div>
    <div class="form-group mb-3">
        <label for="description">Введите описание категории</label>
        <input type="text" value="" name="description" placeholder="Введите описание категории" id="description" class="form-control">
    </div>
    <button type="submit" class="">Добавить</button>
</form>
@endsection
