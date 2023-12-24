@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h1>User detail</h1>

        <div class="container mt-4">
            <div>
                Name: {{ $user->name }}
            </div>
            <div>
                Email: {{ $user->email }}
            </div>
            <div>
                Rol: {{ $user->roles[0]->name }}
            </div>
        </div>

        <div class="mt-4">
            @can('Update user')
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
            @endcan
            <a href="{{ route('users.index') }}" class="btn btn-light shadow-sm">Back</a>
        </div>
    </div>
@endsection