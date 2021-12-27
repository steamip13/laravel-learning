@extends('layouts.app')

@section('content')
    <div class="admin-block-container">
        <h2>Список категорий</h2>
        <a class="back-link" href="{{ route('admin') }}">Назад</a>
    </div>
    <a href="{{ route('category-add')}}"><button class="">Добавить</button></a>
    <table>
        <tr>
            <th>Название категории</th>
            <th>Описание категории</th>
            <th colspan="2">Функции</th>
        </tr>
    @foreach ($categories as $item)
            <tr>
                <td>{{ $item->title }}</td>
                <td>{{ $item->description }}</td>
                <td><a href="{{ route('category-edit', $item->id) }}">Изменить</a></td>
                <td><a href="{{ route('category-delete', $item->id) }}">Удалить</a></td>
            </tr>
    @endforeach
    </table>
@endsection