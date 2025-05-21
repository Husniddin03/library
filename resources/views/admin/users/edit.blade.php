@extends('layouts.admin')

@section('content')
<h2>Edit User</h2>
<form method="POST" action="{{ route('admin.users.update', $user) }}">
    @csrf @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input name="name" class="form-control" value="{{ $user->name }}">
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input name="email" type="email" class="form-control" value="{{ $user->email }}">
    </div>
    <div class="mb-3">
        <label>Password</label>
        <input name="password" type="password" class="form-control" placeholder="Leave blank to keep current password">
    </div>
    <button class="btn btn-primary">Update</button>
</form>
@endsection
