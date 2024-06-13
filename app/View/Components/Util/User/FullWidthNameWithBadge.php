<?php

namespace App\View\Components\Util\User;

use Illuminate\View\Component;

class FullWidthNameWithBadge extends Component
{
    /**
     * Define User
     * @eloquent User
     */
    public $user;
    /**
     * Define is with info
     * @var boolean
     */
    public $withInfo;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($withInfo = true)
    {
        $this->determineWithUserTypeIsLogin();
        $this->withInfo = $withInfo;
    }

    public function determineWithUserTypeIsLogin()
    {
        if (auth()->guard('admin')->check()) {
            $this->user = auth()->guard('admin')->user();
        } else if (auth()->guard('web')->check()) {
            $this->user = auth()->guard('web')->user();
        } else {
            $this->user = null;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.user.full-width-name-with-badge');
    }
}
