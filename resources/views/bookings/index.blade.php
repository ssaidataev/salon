@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Bookings</h1>
        <a href="{{ route('bookings.create') }}" class="btn btn-primary">Add New Booking</a>
        <table class="table mt-3">
            <thead>
            <tr>
                <th>Customer Name</th>
                <th>Service</th>
                <th>Employee</th>
                <th>Date and Time</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->customer_name }}</td>
                    <td>{{ $booking->service->name }}</td>
                    <td>{{ $booking->employee->name }}</td>
                    <td>{{ $booking->booking_time }}</td>
                    <td>
                        <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
