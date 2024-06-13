<?php

namespace App\View\Components\Card;

use Illuminate\View\Component;

class CardHeader extends Component
{
    public $title;
    public $subTitle;
    public $icon;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($title, $subTitle = null, $icon = null)
    {
        $this->title = $title;
        $this->subTitle = $subTitle;
        $this->icon = $icon;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card.card-header');
    }
}
