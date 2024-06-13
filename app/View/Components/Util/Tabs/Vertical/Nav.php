<?php

namespace App\View\Components\Util\Tabs\Vertical;

use Illuminate\View\Component;

class Nav extends Component
{
    public $itemId;
    public $active;
    public $buttonType;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($linkTo, $active = false, $buttonType = 'btn-active-light-success')
    {
        $this->itemId = $linkTo;
        $this->active = $active;
        $this->buttonType = $buttonType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.tabs.vertical.nav');
    }
}
