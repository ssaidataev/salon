<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Employee;
use App\Models\Service;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::with(['employee', 'service'])->get();
        return view('bookings.index', compact('bookings'));
    }

    public function create()
    {
        $employees = Employee::all();
        $services = Service::all();
        $serviceCategories = ServiceCategory::all();
        return view('bookings.create', compact('employees', 'services', 'serviceCategories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
            'booking_time' => 'required|date',
            'category_id' => 'nullable|exists:service_categories,id',
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
        ]);

        Booking::create($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking created successfully.');
    }

    public function edit(Booking $booking)
    {
        $employees = Employee::all();
        $services = Service::all();
        $serviceCategories = ServiceCategory::all(); // Добавлено
        return view('bookings.edit', compact('booking', 'employees', 'services', 'serviceCategories'));
    }


    public function update(Request $request, Booking $booking)
    {
        $request->validate([
            'employee_id' => 'required|exists:employees,id',
            'service_id' => 'required|exists:services,id',
            'booking_time' => 'required|date', // Исправлено
            'customer_name' => 'required|string',
            'customer_phone' => 'required|string',
        ]);

        $booking->update($request->all());

        return redirect()->route('bookings.index')
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Booking $booking)
    {
        $booking->delete();

        return redirect()->route('bookings.index')
            ->with('success', 'Booking deleted successfully.');
    }
}
