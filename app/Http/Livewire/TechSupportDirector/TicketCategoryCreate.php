<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Http\Requests\TechSupportDirector\TicketCategoryCreateRequest;
use Livewire\Component;

class TicketCategoryCreate extends Component
{
    public $title;
    public $value;


    public function mount(){
        $this->title = old("title") ?? "";
        $this->value = old("value") ?? "";
    }
    protected function rules(){
        return (new TicketCategoryCreateRequest())->rules();
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function render()
    {
        return view('livewire.tech-support-director.ticket-category-create');
    }
}
