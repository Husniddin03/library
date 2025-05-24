@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Adminni tahrirlash</h2>
    <form method="POST" action="{{ route('admins.update', $admin) }}">
        @csrf @method('PUT')
        <div class="form-group mb-2">
            <label>Ism:</label>
            <input type="text" name="name" class="form-control" value="{{ $admin->name }}" required>
        </div>
        <div class="form-group mb-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" value="{{ $admin->email }}" required>
        </div>
        <div class="form-group mb-2">
            <label>Yangi parol (ixtiyoriy):</label>
            <input type="password" name="password" class="form-control">
        </div>
        <button class="btn btn-primary">Yangilash</button>
    </form>
</div>
@endsection
