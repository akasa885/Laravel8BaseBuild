<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Str;
class ReloadableTabs extends Component
{
    //data yang akan kita passing
    public $menu_list; 
    public $id_menu;
    public $component_id;
    public $parameterCheck;
    public $parameter;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($menu, $id = null, $parameterCheck = false, $parameter = null)
    {
        $this->menu_list = $menu;
        $this->id_menu = $id ?? $this->generateComponentId();
        $this->component_id = $this->generateComponentId();
        $this->parameterCheck = $parameterCheck;
        if ( $parameterCheck ) {
            $this->parameterAvailableCheck($parameter);
            $this->parameter = $parameter;
        }
    }

    public function generateComponentId()
    {
        return Str::random(9);
    }

    public function parameterAvailableCheck($parameter)
    {
        if ( !$parameter ) throw new \Exception('Parameter is required when parameterCheck is true');
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.reloadable-tabs');
    }
}
