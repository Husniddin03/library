@extends('layouts.admin')

@section('content')
<div class="container">
    <h2>Adminlar ro'yxati</h2>
    <a href="{{ route('admins.create') }}" class="btn btn-primary mb-3">Yangi admin qo'shish</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>#</th><th>Ismi</th><th>Email</th><th>Amallar</th>
            </tr>
        </thead>
        <tbody>
            @foreach($admins as $admin)
                <tr>
                    <td>{{ $admin->id }}</td>
                    <td>{{ $admin->name }}</td>
                    <td>{{ $admin->email }}</td>
                    <td>
                        <a href="{{ route('admins.show', $admin) }}" class="btn btn-info btn-sm">Ko'rish</a>
                        <a href="{{ route('admins.edit', $admin) }}" class="btn btn-warning btn-sm">Tahrirlash</a>
                        <form action="{{ route('admins.destroy', $admin) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Ishonchingiz komilmi?')">O'chirish</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
