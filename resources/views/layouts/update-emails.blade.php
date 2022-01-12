@extends('layouts.app')

@section('content')
<form action="{{ route('emails-update-submit', $email->id) }}" method="post">

    @csrf
    <div class="form-group mb-3">
        <label for="email">Введите email менеджера</label>
        <input type="text" value="{{ $email->email_manager }}" name="email" placeholder="Введите email менеджера" id="email" class="form-control">
    </div>
    <button type="submit" class="">Обновить</button>
</form>
@endsection
