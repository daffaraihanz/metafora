<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class detailService extends Component
{
    public $flexreverse;
    public $image;
    public $about;
    public $title;
    public $desc;

    public function __construct($flexreverse, $image, $about, $title, $desc)
    {
        $this->flexreverse = $flexreverse;
        $this->image = $image;
        $this->about = $about;
        $this->title = $title;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.detail-service');
    }
}
