<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class events extends Component
{
    public $events;

    public function __construct($events)
    {
        $this->events = $events;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.events');
    }
}
