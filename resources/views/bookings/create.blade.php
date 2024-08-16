@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Создать бронирование</h1>
        <form action="{{ route('bookings.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="employee_id">Сотрудник</label>
                <select name="employee_id" id="employee_id" class="form-control">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}">{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_id">Услуга</label>
                <select name="service_id" id="service_id" class="form-control">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}">{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="booking_time">Время</label>
                <input type="datetime-local" name="booking_time" id="booking_time" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="customer_name">Имя клиента</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="customer_phone">Телефон клиента</label>
                <input type="text" name="customer_phone" id="customer_phone" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Создать бронирование</button>
        </form>
    </div>
@endsection
