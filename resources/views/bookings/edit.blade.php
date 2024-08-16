@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Редактировать бронирование</h1>
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="employee_id">Сотрудник</label>
                <select name="employee_id" id="employee_id" class="form-control">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $employee->id == $booking->employee_id ? 'selected' : '' }}>{{ $employee->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_id">Услуга</label>
                <select name="service_id" id="service_id" class="form-control">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $service->id == $booking->service_id ? 'selected' : '' }}>{{ $service->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="booking_time">Время</label>
                <input type="datetime-local" name="booking_time" id="booking_time" class="form-control" value="{{ $booking->booking_time }}" required>
            </div>
            <div class="form-group">
                <label for="customer_name">Имя клиента</label>
                <input type="text" name="customer_name" id="customer_name" class="form-control" value="{{ $booking->customer_name }}" required>
            </div>
            <div class="form-group">
                <label for="customer_phone">Телефон клиента</label>
                <input type="text" name="customer_phone" id="customer_phone" class="form-control" value="{{ $booking->customer_phone }}" required>
            </div>
            <div class="form-group">
                <label for="price">Цена</label>
                <input type="number" step="0.01" name="price" id="price" class="form-control" value="{{ $booking->price }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Сохранить изменения</button>
        </form>
    </div>
@endsection
