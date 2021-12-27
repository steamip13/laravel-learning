@extends('layouts.app')

@section('content')
    <div class="admin-block-container">
        <h2>Список категорий</h2>
        <a class="back-link" href="{{ route('admin') }}">Назад</a>
    </div>
    <a href="{{ route('good-add')}}"><button class="">Добавить</button></a>
    <table>
    <tr>
            <th>Название товара</th>
            <th>Описание товара</th>
            <th>Id категории</th>
            <th>Цена</th>
            <th colspan="2">Функции</th>
        </tr>
    @foreach ($goods as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td>{{ $item->category_id }}</td>
                <td>{{ $item->price }}</td>
                <td><a href="{{ route('good-edit', $item->id) }}">Изменить</a></td>
                <td><a href="{{ route('good-delete', $item->id) }}">Удалить</a></td>
            </tr>
    @endforeach
    </table>
@endsection