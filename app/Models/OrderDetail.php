<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OrderDetail extends Model
{
    use HasFactory;
    protected $fillable = [
        'order_id',
        'service_id',
        'name',
        'email',
        'pick_up_address',
        'delivery_address',
        'quantity',
    ];

    // Relationship with the Order model
    public function order()
    {
        return $this->belongsTo(Order::class);
    }

    // Relationship with the Service model
    public function service()
    {
        return $this->belongsTo(Service::class);
    }
}
