<?php

namespace App\View\Components\userpanel\userstart;

use Illuminate\View\Component;

class userstartc extends Component
{
    public $company;
    public $photo;
    public $user;
    public $notes;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($company,$photo,$user,$notes)
    {
       $this->company =$company;
       $this->photo = $photo;
       $this->user = $user;
       $this->notes = $notes;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.userpanel.userstart.userstartc');
    }
}
