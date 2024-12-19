<?php

namespace App\Http\Livewire\Employee\Users;

use App\Models\User;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class BirthdayTask extends Component
{
    use WithPagination;
    public $month;

    public function mount()
    {
        $this->month = Carbon::now()->month;
    }

    public function updatedMonth()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::whereMonth("birth_date","=", intval($this->month))->orderByRaw('DAY(birth_date) ASC')->paginate(6);
        return view('livewire.employee.users.birthday-task', ['users' => $users]);
    }
}
