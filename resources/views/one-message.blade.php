@extends('layouts.app-view')

@section('title'){{ $contact->subject }}@endsection

@section('content')
   <h1>{{ $contact->subject }}</h1>
   <div class="alert alert-info">
      <p>{{ $contact->name }}</p>
      <p><small>{{ $contact->email }}</small></p>
      <p>{{ $contact->message }}</p>
   </div>
   <a href="{{ route('contact-update', $contact->id) }}"><button class="btn btn-primary">Обновить</button></a>
   <a href="{{ route('contact-delete', $contact->id) }}"><button class="btn btn-danger">Удалить</button></a>
@endsection