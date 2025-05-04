<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $fillable = ['sale_id', 'type', 'status'];

    public function sale()
    {
        return $this->belongsTo(Sale::class);
    }

    public function cod()
    {
        return $this->hasOne(CodPayment::class);
    }

    public function paypal()
    {
        return $this->hasOne(PaypalPayment::class);
    }
}
