{{--<!DOCTYPE html>--}}
{{--<html lang="en">--}}
{{--<head>--}}
{{--    <meta charset="UTF-8">--}}
{{--    <meta name="viewport" content="width=device-width, initial-scale=1.0">--}}
{{--    <title>Hair Salon Management</title>--}}
{{--    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Подключение CSS -->--}}
{{--    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> <!-- Bootstrap -->--}}
{{--    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script> <!-- jQuery -->--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js"></script> <!-- Popper.js -->--}}
{{--    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> <!-- Bootstrap JS -->--}}
{{--</head>--}}
{{--<body>--}}
{{--<nav class="navbar navbar-expand-lg navbar-light bg-light">--}}
{{--    <a class="navbar-brand" href="{{ url('/') }}">Hair Salon</a>--}}
{{--    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">--}}
{{--        <span class="navbar-toggler-icon"></span>--}}
{{--    </button>--}}
{{--    <div class="collapse navbar-collapse" id="navbarNav">--}}
{{--        <ul class="navbar-nav">--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('employees.index') }}">Employees</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('service_categories.index') }}">Service Categories</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('services.index') }}">Services</a>--}}
{{--            </li>--}}
{{--            <li class="nav-item">--}}
{{--                <a class="nav-link" href="{{ route('bookings.index') }}">Bookings</a>--}}
{{--            </li>--}}
{{--        </ul>--}}
{{--    </div>--}}
{{--</nav>--}}

{{--<main role="main" class="container mt-4">--}}
{{--    @yield('content')--}}
{{--</main>--}}

{{--<footer class="footer bg-light mt-4 py-3">--}}
{{--    <div class="container">--}}
{{--        <span class="text-muted">© {{ date('Y') }} Hair Salon Management System</span>--}}
{{--    </div>--}}
{{--</footer>--}}
{{--</body>--}}
{{--</html>--}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Salon Management</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
<div id="app">
    @include('partials.navbar')
    <div class="container mt-4">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
        @yield('content')
    </div>
</div>
</body>
</html>
