@extends('layouts.admin')

@section('content')
    <h2>Create User</h2>
    <form method="POST" action="{{ route('admin.users.store') }}">
        @csrf
        <div class="mb-3">
            <label>Name</label>
            <input name="name" class="form-control">
        </div>
        <div class="mb-3">
            <label>Email</label>
            <input name="email" type="email" class="form-control">
        </div>
        <div class="mb-3">
            <label>Password</label>
            <input name="password" type="password" class="form-control">
        </div>
        <button class="btn btn-success">Save</button>
    </form>
@endsection
