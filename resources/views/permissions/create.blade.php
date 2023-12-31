@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h2>Add new permission</h2>
        <div class="lead">
            Add new permission.
        </div>

        <div class="container mt-4">
            <form method="POST" action="{{ route('permissions.store') }}">
                @csrf
                <div class="my-4">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ old('name') }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>

                    @if ($errors->has('name'))
                        <span class="text-danger text-left">{{ $errors->first('name') }}</span>
                    @endif
                </div>

                @can('Create permission')
                <button type="submit" class="btn btn-primary">Save permission</button>
                @endcan
                <a href="{{ route('permissions.index') }}" class="btn btn-light shadow-sm">Back</a>
            </form>
        </div>

    </div>
@endsection