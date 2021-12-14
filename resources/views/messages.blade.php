@extends('layouts.app-view')

@section('title')Все сообщения@endsection

@section('content')
   <h1>Все сообщения</h1>
   @foreach ($contacts as $element)
    <div class="alert alert-info">
        <h3>{{ $element->subject }}</h3>
        <p>{{ $element->name }}</p>
        <p><small>{{ $element->email }}</small></p>
        <a href="{{ route('contact-data-one', $element->id) }}"><button class="btn btn-warning">Детальнее</button></a>
    </div>
   @endforeach
@endsection

@section('aside')
   @parent
   <p>Дополнительный текст</p>
@endsection