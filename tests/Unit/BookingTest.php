<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Service;

class BookingTest extends TestCase
{
    use RefreshDatabase;

    public function test_belongs_to_an_employee()
    {
        $employee = Employee::factory()->create();
        $booking = Booking::factory()->create(['employee_id' => $employee->id]);

        $this->assertInstanceOf(Employee::class, $booking->employee);
        $this->assertEquals($employee->id, $booking->employee->id);
    }

    public function test_belongs_to_a_service()
    {
        $service = Service::factory()->create();
        $booking = Booking::factory()->create(['service_id' => $service->id]);

        $this->assertInstanceOf(Service::class, $booking->service);
        $this->assertEquals($service->id, $booking->service->id);
    }
}
