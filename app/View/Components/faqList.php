<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class faqList extends Component
{
    public $heading;
    public $collapseTarget;
    public $collapseControl;
    public $title;
    public $collapseId;
    public $headingNumber;
    public $desc;

    public function __construct($heading, $collapseTarget, $collapseControl, $title, $collapseId, $headingNumber, $desc)
    {
        $this->heading = $heading;
        $this->collapseTarget = $collapseTarget;
        $this->collapseControl = $collapseControl;
        $this->title = $title;
        $this->collapseId = $collapseId;
        $this->headingNumber = $headingNumber;
        $this->desc = $desc;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.faq-list');
    }
}
