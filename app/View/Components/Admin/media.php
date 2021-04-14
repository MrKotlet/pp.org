<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class media extends Component
{
   public $streams;


    public function __construct($streams)
    {
       $this->streams = $streams;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.media');
    }
}
