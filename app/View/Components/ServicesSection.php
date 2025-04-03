<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Service;

class ServicesSection extends Component
{
    public $services;

    public function __construct($limit = null)
    {
        $this->services = is_numeric($limit) ? Service::take($limit)->get() : Service::all();
    }

    public function render()
    {
        return view('components.services-section');
    }
}
