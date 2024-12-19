<?php

namespace App\Http\Livewire\Employee\Ticket;

use App\Models\Ticket;
use App\Models\TicketStatus;
use Livewire\Component;

class Index extends Component
{
    public $search;
    public $status_id = null;
    public $statuses;
    public $date;
    public $loading = true;

    public function mount()
    {
        $this->statuses = TicketStatus::all();
    }

    public function updatedStatusId($value)
    {
        $this->status_id = $value;
        // Логика фильтрации может быть вызвана здесь, но это не обязательно,
        // так как `render` автоматически обновляется
    }

    public function updatedDate($value)
    {
        $this->date = $value;
        // Аналогично, фильтрация может быть вызвана через `render`
    }

    public function render()
    {
        $this->loading = true;
        // Создаём запрос для фильтрации тикетов
        $query = Ticket::with(['user', 'category'])->withCount('ticket_messages')
            ->where('user_id', auth()->id());

        // Фильтрация по статусу
        if ($this->status_id) {
            $query->where('status_id', $this->status_id);
        }

        // Фильтрация по дате
        if (!is_null($this->date)) {
            $query->whereDate('created_at', $this->date);
        }

        // Фильтрация по поиску
        if (!empty($this->search)) {
            $query->where('title', 'like', '%' . $this->search . '%');
        }

        // Возвращаем отфильтрованные данные
        return view('livewire.employee.ticket.index', [
            'tickets' => $query->orderBy('updated_at', 'desc')->paginate(20),
        ]);
        $this->loading = false;
    }
}
