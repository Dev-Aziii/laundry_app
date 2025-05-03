<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaypalPayment extends Model
{
    protected $fillable = ['payment_id', 'paypal_email', 'transaction_id'];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
