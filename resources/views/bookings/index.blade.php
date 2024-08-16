@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Бронирования</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Создать новое бронирование</a>
        <table class="table mt-4">
            <thead>
            <tr>
                <th>ID</th>
                <th>Сотрудник</th>
                <th>Услуга</th>
                <th>Время</th>
                <th>Клиент</th>
                <th>Телефон</th>
                <th>Цена</th>
                <th>Действия</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->employee->name }}</td>
                    <td>{{ $booking->service->name }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->customer_phone }}</td>
                    <td>${{ $booking->price }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Редактировать</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Удалить</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
