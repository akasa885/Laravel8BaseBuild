<?php

namespace App\View\Components\Widget\Admin;

use App\Http\Traits\UserIdentifyingTrait;
use Illuminate\View\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class WelcomeCounterCard extends Component
{
    use UserIdentifyingTrait;
    /**
     * Define welcome greeting
     * @string $greeting
     */
    public $greeting;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->greeting = $this->getGreeting();
    }

    public function getGreeting()
    {
        // check session organization
        $user = $this->currentUser();
        $greeting = "Welcome to dashboard <br/>" . $user->name . "!";

        return $greeting;
    }

    public function getDataMemberCount($type = 'user')
    {
        // get session organization
        $user = $this->currentUser();
        if ($type == 'user') {
            return \App\Models\User::user()->get()->count();
        }
        return 'x0';
    }

    public function getDataProductCount()
    {
        return \App\Models\Product::all()->count();
    }

    public function getDataParticipantCount()
    {
        // code...

        return 'x0';
    }

    public function getDataTransactionCount()
    {
        return \App\Models\Transaction::where('status', '!=', 'canceled')->get()->count();
    }


    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.admin.welcome-counter-card');
    }
}
