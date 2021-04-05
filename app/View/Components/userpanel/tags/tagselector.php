<?php

namespace App\View\Components\userpanel\tags;

use Illuminate\View\Component;

class tagselector extends Component
{
    public $tag;
    public $company;

    public function __construct($tag,$company)
    {
       $this -> tag = $tag;
       $this -> company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.tags.tagselector');
    }
}
