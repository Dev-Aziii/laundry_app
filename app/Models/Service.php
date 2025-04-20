<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $fillable = [
        'service_name',
        'price_per_kg',
        'description',
        'image1',
        'image2',
        'duration'
    ];

    public function orderDetails()
    {
        return $this->hasMany(OrderDetail::class);
    }
}
