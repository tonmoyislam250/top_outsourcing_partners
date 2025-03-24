<?php

namespace App\View\Components;

use Illuminate\View\Component;

class WhyChooseUs extends Component
{
    public $features;

    public function __construct()
    {
        $this->features = [
            ['icon' => '📈', 'text' => 'Scalability & Cost-Effectiveness', 'color' => 'yellow'],
            ['icon' => '👥', 'text' => 'Expert-Led Solutions', 'color' => 'purple'],
            ['icon' => '🔒', 'text' => 'Security & Compliance Assurance', 'color' => 'blue'],
            ['icon' => '⏳', 'text' => '24/7 Support & Dedicated Assistance', 'color' => 'green'],
            ['icon' => '🏆', 'text' => 'Proven Track Record', 'color' => 'pink'],
        ];
    }

    public function render()
    {
        return view('components.why-choose-us');
    }
}
