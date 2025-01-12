@extends('layouts.email-main')

@section('content')

<h1>Вітаємо!</h1>
<p><a href="{{ $url }}">{{ $name }}</a> вже доступно в нашому <a href="{{ $url }}">автопарку</a>.</p>

@endsection