<?php

namespace App\View\Components\Widget;

use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class CountingDownTime extends Component
{
    public $model;
    public $dateColumn;
    protected $timeColumn;
    public $datetime;
    /**
     * Create a new component instance.
     *
     * @param Model $model
     * @param $timeColumn 
     * @return void
     */
    public function __construct(Model $model, $dateColumn, $timeColumn = null)
    {
        $this->model = $model;
        $this->dateColumn = $dateColumn;
        $this->timeColumn = $timeColumn;
        $time = $this->convertTimeTo24HourFormat($model->$timeColumn);
        $this->datetime = date('Y-m-d', strtotime($model->$dateColumn)).' '.$time;
    }

    private function convertTimeTo24HourFormat($time)
    {
        $time = date("H:i:s", strtotime($time));
        return $time;
    }

    public function isEventDatePassed()
    {
        $now = date('Y-m-d H:i:s');
        return $now > $this->datetime;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.widget.counting-down-time');
    }
}
