<?php

namespace App\View\Components\Widget\User;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class ProfileCompletionNotification extends Component
{
    /**
     * 
     * @var string
     */
    public $component_uid;
    /**
     * 
     * @var int
     */
    public $completedStep = 1;
    /**
     * 
     * @var int
     */
    public $completedStepPercentage = 0;
    /**
     * 
     * @var array
     */
    public $allStep = [
        'basic profile'
    ];
    /**
     * 
     * @var int
     */
    public $totalStep;
    /**
     * 
     * @var array
     */
    protected $checkedStepMethod = [
        'shippingInformation',
    ];
    /**
     * 
     * @var array
     */
    public $completeCheck = [
        'shippingInformation' => false,
    ];
    /**
     * 
     * @var string
     */
    public $title;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user, $title = "Profile Completion")
    {
        $this->gerateUniqueComponentId();
        $this->setAllStep();
        $this->title = $title;
        $this->setCompletedStep($user);
    }

    private function setTotalStep($user)
    {
        $this->totalStep = count($this->checkedStepMethod) + 1;
    }

    private function setCompletedStep($user)
    {
        $this->setTotalStep($user);
        foreach ($this->checkedStepMethod as $method) {
            if (($user->{$method} != null) && ($user->{$method}->count() > 0)) {
                $this->completeCheck[$method] = true;
                $this->completedStep++;
            }
        }
    }

    private function gerateUniqueComponentId()
    {
        $this->component_uid = Str::random(6);
    }

    public function getPercentage()
    {
        return round(($this->completedStep / $this->totalStep) * 100);
    }

    private function setAllStep()
    {
        $this->allStep = array_merge($this->allStep, $this->checkedStepMethod);
        // refactor array, seperate dimension for each 2 element
        $this->allStep = array_chunk($this->allStep, 2);
    }

    public function renameStepName($step)
    {
        // change any camelCase or snake_case to space separated
        return ucwords(preg_replace('/(?<!^)[A-Z]/', ' $0', $step));
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.user.profile-completion-notification');
    }
}
