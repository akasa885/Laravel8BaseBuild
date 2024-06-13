<?php

namespace App\View\Components\Widget\Content;

use Illuminate\View\Component;

class KbContentDetail extends Component
{
    public $title;
    public $innerText;
    public $iconClass;
    public $svgName;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $innerText, $iconClass = null, $svgName = null)
    {
        $this->title = $title;
        $this->innerText = $innerText;
        $this->iconClass = $iconClass;
        $this->svgName = $svgName;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.content.kb-content-detail');
    }
}
