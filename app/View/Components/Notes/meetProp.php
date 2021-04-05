<?php

namespace App\View\Components\Notes;

use Illuminate\View\Component;

class meetProp extends Component
{
    public $note;

    public function __construct($note)
    {
        $this->note = $note;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\View\View|string
     */
    public function render()
    {
        return view('components.notes.meet-prop');
    }
}
