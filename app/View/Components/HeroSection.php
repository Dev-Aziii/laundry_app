<?php

namespace App\View\Components;

use Illuminate\View\Component;

class HeroSection extends Component
{
    public $title;
    public $words;
    public $introLink;
    public $servicesLink;

    public function __construct($title, $words, $introLink, $servicesLink)
    {
        $this->title = $title;
        $this->words = explode(',', $words);
        $this->introLink = $introLink;
        $this->servicesLink = $servicesLink;
    }

    public function render()
    {
        return view('components.hero-section');
    }
}
