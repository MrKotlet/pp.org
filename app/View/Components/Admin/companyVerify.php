<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class companyVerify extends Component
{
    public $companies;

    public function __construct($companies)
    {
        $this->companies = $companies;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.company-verify');
    }
}
