@extends('layouts.app')

@section('content')
<form action="{{ route('changeEmailSubmit') }}" method="post">

    @csrf
    <div class="form-group mb-3">
        <label for="email">Введите новый Email</label>
        <input type="text" value="" name="email" placeholder="Введите новый Email" id="email" class="form-control">
    </div>
    <button type="submit" class="">Изменить</button>
</form>
@endsection
