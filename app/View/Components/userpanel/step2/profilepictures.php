<?php

namespace App\View\Components\userpanel\step2;

use Illuminate\View\Component;

class profilepictures extends Component
{

    public $company;
    public $logo;
    public $main;

    public function __construct($company,$logo,$main)
    {
        $this -> company = $company;
        $this -> main = $main;
        $this -> logo = $logo;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.step2.profilepictures');
    }
}
