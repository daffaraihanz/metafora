<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class card1 extends Component
{
    public $title;
    public $desc;

    public function __construct($title, $desc)
    {
        $this->title = $title;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card1');
    }
}
