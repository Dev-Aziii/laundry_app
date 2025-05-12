<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CodPayment extends Model
{
    protected $fillable = ['payment_id', 'receiver_name', 'email', 'paid'];

    public function payment()
    {
        return $this->belongsTo(Payment::class);
    }
}
