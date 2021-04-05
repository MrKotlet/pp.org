<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class roles extends Component
{
    public $roles;

    public function __construct($roles)
    {
        $this->roles = $roles;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.roles');
    }
}
