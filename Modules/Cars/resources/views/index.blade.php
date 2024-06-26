@extends('cars::layouts.master')

@section('content')
    <h1>Hello World</h1>

    <p>Module: {!! config('cars.name') !!}</p>
@endsection
