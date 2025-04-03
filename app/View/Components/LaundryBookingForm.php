<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use App\Models\Service;

class LaundryBookingForm extends Component
{
    public $user;
    public $services;

    public function __construct()
    {
        $this->user = Auth::user();
        $this->services = Service::all();
    }

    public function render()
    {
        return view('user.booking');
    }
}
