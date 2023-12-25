@extends('errors::minimal')

@section('title', __('Not Found'))
@section('code', '404')
@section('message', __('Not Found'))

@section('button')
  <a class="btn btn-sm btn-outline-light shadow-sm rounded-lg" href="{{route('home')}}">Volver</a>
@endsection

