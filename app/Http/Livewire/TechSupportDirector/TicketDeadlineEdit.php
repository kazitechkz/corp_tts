<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Http\Requests\TechSupportDirector\TicketDeadlineCreateRequest;
use App\Http\Requests\TechSupportDirector\TicketDeadlineEditRequest;
use Livewire\Component;

class TicketDeadlineEdit extends Component
{
    public $title;
    public $value;
    public $time_limit_hour;
    public $model;

    public function mount($model){
        $this->model = $model;
        $this->title = $model->title;
        $this->value = $model->value;
        $this->time_limit_hour = $model->time_limit_hour;
    }
    protected function rules(){
        return (new TicketDeadlineEditRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.tech-support-director.ticket-deadline-edit');
    }
}
