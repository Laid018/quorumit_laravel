@extends('errors::minimal')

@section('title', __('Forbidden'))
@section('code', '403')
@section('message', __($exception->getMessage() ?: 'Forbidden'))

@section('button')
  <a class="btn btn-sm btn-outline-light shadow-sm rounded-lg" href="{{route('home')}}">Volver</a>
@endsection
