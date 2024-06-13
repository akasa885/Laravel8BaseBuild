<?php

namespace App\View\Components\Util\Button;

use Illuminate\View\Component;

class LinkIconBox extends Component
{
    public $onClick;
    public $onClickScript;
    public $btnType;
    public $tooltip;
    public $href;
    public $btnColor;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($href = '#', $tooltip = null, $btnType = 'edit', $onClick = null, $onClickScript= null, $btnColor = 'active-color-primary')
    {
        $this->href = $href;
        $this->tooltip = $tooltip;
        $this->btnType = $btnType;
        $this->onClick = $onClick;
        $this->onClickScript = $onClickScript;
        $this->btnColor = $btnColor;
    }

    public function make()
    {
        return $this;
    }

    public function icon()
    {
        return $this->btnType;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.button.link-icon-box');
    }
}
