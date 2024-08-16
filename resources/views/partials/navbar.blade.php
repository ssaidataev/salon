<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="{{ url('/') }}">Salon Management</a>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('bookings.index') }}">Бронирования</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('employees.index') }}">Сотрудники</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('services.index') }}">Услуги</a>
            </li>
            <!-- Добавьте другие ссылки по мере необходимости -->
        </ul>
    </div>
</nav>
