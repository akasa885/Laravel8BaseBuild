<?php

namespace App\View\Components\Util\User;

use Illuminate\View\Component;

class MetronicHeaderUserInfo extends Component
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
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->determineWithUserTypeIsLogin();
    }

    public function determineWithUserTypeIsLogin()
    {
        $this->user = auth()->user();
        // if (auth()->guard('admin')->check()) {
        //     $this->user = auth()->guard('admin')->user();
        // } else if (auth()->guard('web')->check()) {
        //     $this->user = auth()->guard('web')->user();
        // } else {
        //     $this->user = null;
        // }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.util.user.metronic-header-user-info');
    }
}
