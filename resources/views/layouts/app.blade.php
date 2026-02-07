<!DOCTYPE html>
<html>
<head>
    <title>School System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">School System</a>

        <ul class="navbar-nav ms-auto">
            @auth
                @can('view users')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('users.index') }}">Users</a>
                    </li>
                @endcan

                <li class="nav-item">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                </li>

                <form id="logout-form" method="POST" action="{{ route('logout') }}">
                    @csrf
                </form>
            @endauth
        </ul>
    </div>
</nav>

<div class="container mt-4">
    @yield('content')
</div>

</body>
</html>
