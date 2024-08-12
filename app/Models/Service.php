<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
        'category_id',
    ];
    public function salon()
    {
        return $this->belongsTo(Salon::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
    public function category()
    {
        return $this->belongsTo(ServiceCategory::class, 'category_id');
    }

}
