@extends('layouts.app')

@section('content')
    <div class="admin-block-container">
        <h2>Список Email</h2>
        <a class="back-link" href="{{ route('admin') }}">Назад</a>
    </div>
    <a href="{{ route('emails-add')}}"><button class="">Добавить</button></a>
    <table>
    <tr>
            <th>Email менеджера</th>
            <th colspan="2">Функции</th>
        </tr>
    @foreach ($emails as $email)
            <tr>
                <td>{{ $email->email_manager }}</td>
                <td><a href="{{ route('emails-edit', $email->id) }}">Изменить</a></td>
                <td><a href="{{ route('emails-delete', $email->id) }}">Удалить</a></td>
            </tr>
    @endforeach
    </table>
@endsection