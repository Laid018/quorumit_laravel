@extends('layouts.app')

@section('content')
    <div class="bg-light p-4 rounded container">
        <h1>Update role</h1>
        <div class="lead">
            Edit role and manage permissions.
        </div>

        <div class="container mt-4">

            @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                    </ul>
                </div>
            @endif

            <form method="POST" action="{{ route('roles.update', $role->id) }}">
                @method('PUT')
                @csrf
                <div class="mb-4">
                    <label for="name" class="form-label">Name</label>
                    <input value="{{ $role->name }}" 
                        type="text" 
                        class="form-control" 
                        name="name" 
                        placeholder="Name" required>
                </div>
                
                <label for="permissions" class="form-label"><u>Assign</u> <u>Permissions</u></label>

                <table class="table table-striped">
                    <thead class="table-dark">
                        <th scope="col" width="1%"><input type="checkbox" name="all_permission"></th>
                        <th scope="col" width="20%">Name</th>
                        <th scope="col" width="1%">Guard</th> 
                    </thead>

                    @foreach($permissions as $permission)
                        <tr>
                            <td>
                                <input type="checkbox" 
                                name="permission[{{ $permission->name }}]"
                                value="{{ $permission->name }}"
                                class='permission'
                                {{ in_array($permission->name, $rolePermissions) 
                                    ? 'checked'
                                    : '' }}>
                            </td>
                            <td>{{ $permission->name }}</td>
                            <td>{{ $permission->guard_name }}</td>
                        </tr>
                    @endforeach
                </table>

                @can('Update role')
                <button type="submit" class="btn btn-primary">Save changes</button>
                @endcan
                <a href="{{ route('roles.index') }}" class="btn btn-light shadow-sm">Back</a>
            </form>
        </div>

    </div>
@endsection
