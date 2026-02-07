@extends('layouts.app')

@section('content')
<h3>User Management</h3>

@can('create users')
    <a href="{{ route('users.create') }}" class="btn btn-primary mb-3">+ Add User</a>
@endcan

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Name</th>
            <th>Email</th>
            <th>Role</th>
            <th width="180">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach($users as $user)
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->getRoleNames()->first() }}</td>
            <td>
                @can('edit users')
                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                @endcan

                @can('delete users')
                    <form method="POST" action="{{ route('users.destroy', $user->id) }}" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"
                                onclick="return confirm('Delete this user?')">
                            Delete
                        </button>
                    </form>
                @endcan
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection
