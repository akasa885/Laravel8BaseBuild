<?php

namespace App\View\Components\Action;

use Illuminate\View\Component;

class ButtonWithIndicator extends Component
{
    public $id;
    public $label;
    public $labelLoading;
    public $onclick;
    public $type;
    public $timeLoading;
    public $value;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($id, $label, $labelLoading, $type, $onclick = null, $value = null, $timeLoading = null)
    {
        // change time to number
        if ($timeLoading != null) {
            $time = (int) $timeLoading;
        }
        $this->id = $id;
        $this->label = $label;
        $this->labelLoading = $labelLoading;
        $this->onclick = $onclick;
        $this->type = $type;
        $this->value = $value;
        $this->timeLoading = $time ?? 3000; // time in miliseconds
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.action.button-with-indicator');
    }
}
