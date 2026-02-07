@extends('layouts.app')

@section('content')
<h3>Create User</h3>

<form method="POST" action="{{ route('users.store') }}">
    @csrf

    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>

    <div class="mb-3">
        <label>Role</label>
        <select name="role" class="form-control" required>
            @foreach($roles as $role)
                <option value="{{ $role->name }}">{{ ucfirst($role->name) }}</option>
            @endforeach
        </select>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
</form>
@endsection
