<?php

namespace App\View\Components\userpanel\step2;

use Illuminate\View\Component;

class photocard extends Component
{
    public $company;
    public $type;
    public $photo;

    public function __construct($company,$photo,$type)
    {
        $this->company = $company;
        $this->photo = $photo;
        $this->type = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.step2.photocard');
    }
}
