<?php

namespace App\View\Components\Util\Icon;

use Illuminate\View\Component;

class Base extends Component
{
    public $typeIcon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = '2')
    {
        $this->typeIcon = $type;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.icon.base');
    }
}
