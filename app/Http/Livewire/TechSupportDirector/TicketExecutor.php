<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Models\TicketCategory;
use App\Models\User;
use Livewire\Component;
use App\Models\TicketExecutor as ModelsTicketExecutor;
class TicketExecutor extends Component
{
    public $executors;
    public $ticketExecutors;
    public $ticketCategories;
    public $showModal = false;
    public $user;
    public $user_id;
    public $category_id;
    public $busy_category_ids = [];

    public function mount(){
       $this->getExecutors();
       $this->ticketCategories = TicketCategory::all();
    }

    public function render()
    {
        return view('livewire.tech-support-director.ticket-executor');
    }

    public function getExecutors()
    {
        $this->executors = User::where(["role_id" => 5])->with(["role","ticket_executors.ticketCategory"])->get();
        $this->ticketExecutors = TicketExecutor::all();
    }

    public function openModal($executor_id)
    {
        $this->user_id = $executor_id;
        $this->user = $this->executors->where('id', $executor_id)->first();
        if($this->user){
            foreach($this->user->ticket_executors as $ticketExecutorItem){
                array_push($this->busy_category_ids, $ticketExecutorItem->category_id);
            }
        }
        $this->resetForm(); // Clear the form
        $this->showModal = true;
    }

    public function closeModal()
    {
        $this->user_id = null;
        $this->busy_category_ids = [];
        $this->user = null;
        $this->category_id = null;
        $this->showModal = false;
    }
    private function resetForm()
    {

    }

    public function deleteExecution($executionId)
    {
        $execution = ModelsTicketExecutor::find($executionId);
        if($execution){
            $execution->delete();
        }
        $this->getExecutors();
    }

    public function saveTicketExecutor()
    {
        $category = TicketCategory::find($this->category_id);
        if($category){
            ModelsTicketExecutor::add([
                "category_id" => $this->category_id,
                "executor_id" => $this->user_id,
                "category_value" => $category->value]);
        }
        $this->closeModal();
        $this->getExecutors();
    }
}
