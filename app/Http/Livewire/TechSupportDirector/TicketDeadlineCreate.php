<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Http\Requests\TechSupportDirector\TicketDeadlineCreateRequest;
use Livewire\Component;

class TicketDeadlineCreate extends Component
{
    public $title;
    public $value;
    public $time_limit_hour;


    public function mount(){
        $this->title = old("title") ?? "";
        $this->value = old("value") ?? "";
        $this->time_limit_hour = old("time_limit_hour") ?? "";
    }
    protected function rules(){
        return (new TicketDeadlineCreateRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }


    public function render()
    {
        return view('livewire.tech-support-director.ticket-deadline-create');
    }
}
