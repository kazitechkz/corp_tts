<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Http\Requests\TechSupportDirector\TicketCategoryEditRequest;
use Livewire\Component;

class TicketCategoryEdit extends Component
{
    public $model;
    public $title;
    public $value;


    public function mount($model){
        $this->model = $model;
        $this->title = $model->title ??"";
        $this->value = $model->value ??"";
    }
    protected function rules(){
        return (new TicketCategoryEditRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.tech-support-director.ticket-category-edit');
    }
}
