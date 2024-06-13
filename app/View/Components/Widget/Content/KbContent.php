<?php

namespace App\View\Components\Widget\Content;

use Illuminate\View\Component;
use Illuminate\Support\Str;

class KbContent extends Component
{
    public $componentId;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->componentId = 'kb-'.Str::random(4);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.content.kb-content');
    }
}
