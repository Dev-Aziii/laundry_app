<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'ref_no',
        'payment_method',
        'status',
        'pickup_date',
        'delivery_date',
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
    public function sale()
    {
        return $this->hasOne(Sale::class);
    }
}
