<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Http\Requests\TechSupportDirector\TicketStatusCreateRequest;
use App\Models\Ticket;
use App\Models\TicketStatus;
use Livewire\Component;

class TicketStatusCreate extends Component
{
    public $title;
    public $value;
    public $is_last;
    public $is_first;
    public $prev_id;
    public $next_id;
    public $tickets_status;


    public function mount(){
        $this->title = old("title") ?? "";
        $this->value = old("value") ?? "";
        $this->tickets_status = TicketStatus::all();
    }
    protected function rules(){
        return (new TicketStatusCreateRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.tech-support-director.ticket-status-create');
    }
}
