<?php

namespace App\View\Components\userpanel\step2;

use Illuminate\View\Component;

class tagchanger extends Component
{
    public $tags;
    public $company;

    public function __construct($company,$tags)
    {
        $this -> company = $company;
        $this -> tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.step2.tagchanger');
    }
}
