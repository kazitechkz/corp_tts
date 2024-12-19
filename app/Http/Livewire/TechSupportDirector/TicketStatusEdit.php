<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Http\Requests\TechSupportDirector\TicketStatusCreateRequest;
use App\Http\Requests\TechSupportDirector\TicketStatusEditRequest;
use App\Models\TicketStatus;
use Livewire\Component;

class TicketStatusEdit extends Component
{
    public $title;
    public $value;
    public $is_last;
    public $is_first;
    public $prev_id;
    public $next_id;
    public $tickets_status;
    public $model;


    public function mount($model){
        $this->model = $model;
        $this->title = $this->model->title;
        $this->value = $this->model->value;
        $this->tickets_status = TicketStatus::where("id","!=",$this->model->id)->get();
        $this->prev_id = $this->model->prev_id;
        $this->next_id = $this->model->next_id;
        $this->is_last = $this->model->is_last;
        $this->is_first = $this->model->is_first;

    }
    protected function rules(){
        return (new TicketStatusEditRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }
    public function render()
    {
        return view('livewire.tech-support-director.ticket-status-edit');
    }
}
