<?php

namespace App\View\Components\Admin;

use Illuminate\View\Component;

class photoVerify extends Component
{
    public $photos;

    public function __construct($photos)
    {
        $this->photos = $photos;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.admin.photo-verify');
    }
}
