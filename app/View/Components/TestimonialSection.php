<?php

namespace App\View\Components;

use Illuminate\View\Component;

class TestimonialSection extends Component
{
    public $testimonials;

    public function __construct($testimonials)
    {
        $this->testimonials = $testimonials;
    }

    public function render()
    {
        return view('components.testimonial-section');
    }
}
