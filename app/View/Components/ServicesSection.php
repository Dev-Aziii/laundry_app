<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Service;

class ServicesSection extends Component
{
    public $services;

    public function __construct()
    {
        $this->services = Service::all();
    }

    public function render()
    {
        return view('components.services-section');
    }
}
