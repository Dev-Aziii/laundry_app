<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Order extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'ref_no', 'status'];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
