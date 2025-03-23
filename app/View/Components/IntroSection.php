<?php

namespace App\View\Components;

use Illuminate\View\Component;

class IntroSection extends Component
{
    public $title;
    public $description;
    public $phone;

    public function __construct($title, $description, $phone)
    {
        $this->title = $title;
        $this->description = $description;
        $this->phone = $phone;
    }

    public function render()
    {
        return view('components.intro-section');
    }
}
