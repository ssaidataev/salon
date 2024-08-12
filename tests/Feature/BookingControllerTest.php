<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\Booking;
use App\Models\Employee;
use App\Models\Service;
use App\Models\ServiceCategory;

class BookingControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_user_can_create_a_booking()
    {
        $employee = Employee::factory()->create();
        $service = Service::factory()->create();
        $serviceCategory = ServiceCategory::factory()->create();

        $response = $this->post('/bookings', [
            'employee_id' => $employee->id,
            'service_id' => $service->id,
            'category_id' => $serviceCategory->id,
            'booking_time' => now()->format('Y-m-d H:i:s'),
            'customer_name' => 'Jane Doe',
            'customer_phone' => '1234567890',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/bookings');
        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'Jane Doe',
            'customer_phone' => '1234567890',
        ]);
    }

    /** @test */
    public function a_user_can_edit_a_booking()
    {
        $booking = Booking::factory()->create();
        $newEmployee = Employee::factory()->create();
        $newService = Service::factory()->create();

        $response = $this->put('/bookings/' . $booking->id, [
            'employee_id' => $newEmployee->id,
            'service_id' => $newService->id,
            'booking_time' => now()->format('Y-m-d H:i:s'),
            'customer_name' => 'John Doe',
            'customer_phone' => '0987654321',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/bookings');
        $this->assertDatabaseHas('bookings', [
            'customer_name' => 'John Doe',
            'customer_phone' => '0987654321',
        ]);
    }

    /** @test */
    public function a_user_can_delete_a_booking()
    {
        $booking = Booking::factory()->create();

        $response = $this->delete('/bookings/' . $booking->id);

        $response->assertStatus(302);
        $response->assertRedirect('/bookings');
        $this->assertDatabaseMissing('bookings', [
            'id' => $booking->id,
        ]);
    }
}
