<?php

namespace App\View\Components\Util\Button;

use Illuminate\View\Component;

class Base extends Component
{
    public $type;
    public $size;
    public $color;
    public $text;
    public $href;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($type = 'button', $text, $size = null, $color = null, $href = null)
    {
        $this->type = $type;
        $this->size = $size;
        $this->text = $text;
        $this->color = $color;
        $this->href = $href ?? '#';
    }

    public function buildClass()
    {
        $class = 'btn';
        if ($this->size) {
            $class .= ' btn-' . $this->size;
        }
        if ($this->color) {
            $class .= ' ' . $this->color;
        }
        
        if ( count($this->attributes->getAttributes()) > 0 ) {
            foreach ($this->attributes as $key => $value) {
                if($key == 'class') {
                    $class .= ' ' . $value;
                }
            }
        }

        return $class;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.button.base');
    }
}
