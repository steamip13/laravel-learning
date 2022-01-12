@extends('layouts.app')

@section('content')
<form action="{{ route('add-emails-submit') }}" method="post">

    @csrf
    <div class="form-group mb-3">
        <label for="email">Введите email менеджера</label>
        <input type="text" value="" name="email" placeholder="Введите email менеджера" id="email" class="form-control">
    </div>
    <button type="submit" class="">Добавить</button>
</form>
@endsection
