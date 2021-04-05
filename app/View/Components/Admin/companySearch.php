<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class companySearch extends Component
{
    public $companies;
    public $tags;

    public function __construct($companies, $tags)
    {
        $this->companies = $companies;
        $this->tags = $tags;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.company-search');
    }
}
