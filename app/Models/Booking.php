<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'employee_id',
        'service_id',
        'booking_time',
        'customer_name',
        'customer_phone',
    ];

    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
