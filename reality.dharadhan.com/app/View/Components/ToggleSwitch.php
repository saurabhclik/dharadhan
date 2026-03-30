<?php

namespace App\View\Components;

use Illuminate\View\Component;

class ToggleSwitch extends Component
{
    public $name;
    public $checked;

    public function __construct($name = null, $checked = false)
    {
        $this->name = $name;
        $this->checked = $checked;
    }

    public function render()
    {
        return view('components.toggle-switch');
    }
}
