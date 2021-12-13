@extends('layouts.app-view')

@section('title')Страница контактов@endsection

@section('content')
   <h1>Страница контактов</h1>

   <form action="{{ route('contact-form') }}" method="post">

      @csrf
      <div class="form-group mb-3">
         <label for="name">Введите имя</label>
         <input type="text" name="name" placeholder="Введите имя" id="name" class="form-control">
      </div>
      <div class="form-group mb-3">
         <label for="email">Введите email</label>
         <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
      </div>
      <div class="form-group mb-3">
         <label for="name">Введите тему сообщения</label>
         <input type="text" name="subject" placeholder="Введите тему сообщения" id="subject" class="form-control">
      </div>
      <div class="form-group mb-3">
         <label for="message">Введите сообщение</label>
         <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea>
      </div>
      <button type="submit" class="btn btn-success">Отправить</button>
   </form>
@endsection
