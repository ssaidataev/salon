@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Booking</h1>
        <form action="{{ route('bookings.update', $booking->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="customer_name">Customer Name</label>
                <input type="text" name="customer_name" class="form-control" value="{{ $booking->customer_name }}" required>
            </div>
            <div class="form-group">
                <label for="service_id">Service</label>
                <select name="service_id" class="form-control">
                    @foreach ($services as $service)
                        <option value="{{ $service->id }}" {{ $booking->service_id == $service->id ? 'selected' : '' }}>
                            {{ $service->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="employee_id">Employee</label>
                <select name="employee_id" class="form-control">
                    @foreach ($employees as $employee)
                        <option value="{{ $employee->id }}" {{ $booking->employee_id == $employee->id ? 'selected' : '' }}>
                            {{ $employee->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="date_time">Date and Time</label>
                <input type="datetime-local" name="date_time" class="form-control" value="{{ $booking->date_time->format('Y-m-d\TH:i') }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
@endsection
