<?php

namespace App\View\Components\userpanel\step2;

use Illuminate\View\Component;

class descriptionchanger extends Component
{
    public $company;

    public function __construct($company)
    {
        $this -> company = $company;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.step2.descriptionchanger');
    }
}
