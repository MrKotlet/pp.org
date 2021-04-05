<?php

namespace App\View\Components\userpanel;

use Illuminate\View\Component;

class homenav extends Component
{
    public $company;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($company, $user)
    {
        $this->company = $company;
        $this->user = $user;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.homenav');
    }
}
