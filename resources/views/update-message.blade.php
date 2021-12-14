@extends('layouts.app-view')

@section('title')Обновление записи@endsection

@section('content')
   <h1>Обновление записи</h1>

   <form action="{{ route('contact-update-submit', $contact->id) }}" method="post">

      @csrf
      <div class="form-group mb-3">
         <label for="name">Введите имя</label>
         <input type="text" value="{{ $contact->name }}" name="name" placeholder="Введите имя" id="name" class="form-control">
      </div>
      <div class="form-group mb-3">
         <label for="email">Введите email</label>
         <input type="text" value="{{ $contact->email }}" name="email" placeholder="Введите email" id="email" class="form-control">
      </div>
      <div class="form-group mb-3">
         <label for="name">Введите тему сообщения</label>
         <input type="text" value="{{ $contact->subject }}" name="subject" placeholder="Введите тему сообщения" id="subject" class="form-control">
      </div>
      <div class="form-group mb-3">
         <label for="message">Введите сообщение</label>
         <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение">{{ $contact->message }}</textarea>
      </div>
      <button type="submit" class="btn btn-success">Обновить</button>
   </form>
@endsection
