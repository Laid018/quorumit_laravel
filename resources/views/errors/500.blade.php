@extends('errors::minimal')

@section('title', __('Server Error'))
@section('code', '500')
@section('message', __('Server Error'))

@section('button')
  <a class="btn btn-sm btn-outline-light shadow-sm rounded-lg" href="{{route('home')}}">Volver</a>
@endsection