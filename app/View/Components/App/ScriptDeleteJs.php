<?php

namespace App\View\Components\App;

use Illuminate\View\Component;

class ScriptDeleteJs extends Component
{
    public $alertMessage;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($alertMessage = null)
    {
        $this->alertMessage = $alertMessage;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.app.script-delete-js');
    }
}
