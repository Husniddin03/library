@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Admin ma'lumotlari</h2>
    <p><strong>Ism:</strong> {{ $admin->name }}</p>
    <p><strong>Email:</strong> {{ $admin->email }}</p>
    <a href="{{ route('admins.index') }}" class="btn btn-secondary">Orqaga</a>
</div>
@endsection
