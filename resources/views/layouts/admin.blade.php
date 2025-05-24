<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="bg-dark text-white p-3" style="width: 250px; min-height: 100vh;">
            <h4 class="text-center">Admin</h4>
            <ul class="nav flex-column">
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.users.index') }}">Users</a>
                </li>
                <li class="nav-item"><a class="nav-link text-white"
                        href="{{ route('admin.authors.index') }}">Authors</a></li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admin.books.index') }}">Books</a>
                </li>
                <li class="nav-item"><a class="nav-link text-white" href="{{ route('admins.index') }}">Admins</a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('admin.logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="nav-link btn btn-link text-white p-3" style="text-decoration: none;">Logout</button>
                    </form>
                </li>
            </ul>
        </div>

        <!-- Main content -->
        <div class="flex-grow-1 p-4">
            <nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">Library Admin</a>
                </div>
            </nav>
            @yield('content')
        </div>
    </div>
</body>

</html>
