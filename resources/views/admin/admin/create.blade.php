@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Yangi admin qo'shish</h2>
    <form method="POST" action="{{ route('admins.store') }}">
        @csrf
        <div class="form-group mb-2">
            <label>Ism:</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Email:</label>
            <input type="email" name="email" class="form-control" required>
        </div>
        <div class="form-group mb-2">
            <label>Parol:</label>
            <input type="password" name="password" class="form-control" required>
        </div>
        <button class="btn btn-success">Saqlash</button>
    </form>
</div>
@endsection
