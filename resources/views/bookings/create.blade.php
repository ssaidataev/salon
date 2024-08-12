@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>{{ isset($booking) ? 'Edit Booking' : 'Create Booking' }}</h1>
        <form action="{{ isset($booking) ? route('bookings.update', $booking->id) : route('bookings.store') }}" method="POST">
            @csrf
            @if (isset($booking))
                @method('PUT')
            @endif
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" value="{{ old('customer_name', $booking->customer_name ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="customer_phone">Customer Phone</label>
                <input type="text" name="customer_phone" class="form-control" value="{{ old('customer_phone', $booking->customer_phone ?? '') }}" required>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select name="employee_id" class="form-control" required>
                    @foreach($employees as $employee)
                        <option value="{{ $employee->id }}" {{ (isset($booking) && $booking->employee_id == $employee->id) ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_id">Service</label>
                <select name="service_id" class="form-control" required>
                    @foreach($services as $service)
                        <option value="{{ $service->id }}" {{ (isset($booking) && $booking->service_id == $service->id) ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="service_category_id">Категория услуги</label>
                <select id="service_category_id" name="category_id" class="form-control">
                    <option value="">Выберите категорию услуги</option>
                    @foreach($serviceCategories as $serviceCategory)
                        <option value="{{ $serviceCategory->id }}">{{ $serviceCategory->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="booking_time">Booking Time</label>
                <input type="datetime-local" name="booking_time" class="form-control" value="{{ old('booking_time', isset($booking) ? $booking->booking_time->format('Y-m-d\TH:i') : '') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Save Booking</button>
        </form>
    </div>
@endsection
