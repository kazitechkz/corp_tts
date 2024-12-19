<?php

namespace App\Http\Livewire\TechSupportDirector;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TicketDeadline;

class TicketDeadlineTable extends DataTableComponent
{
    protected $model = TicketDeadline::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([20,50,100]);
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('cto-ticket-deadline.edit', $row);
            });
        $this->setBulkActions([
            'deleteSelected' => 'Удалить'
        ]);
    }

    public function deleteSelected(): void
    {
        $items = $this->getSelected();
        foreach ($items as $key => $value) {
            $model = TicketDeadline::find($value);
            if ($model and !in_array($value, [1,2,3])) {
                $model?->delete();
            }

        }
        $this->clearSelected();
    }

    public function columns(): array
    {
        return [
            Column::make("Уникальный идентификатор", "id")
                ->searchable(),
            Column::make("Наименование", "title")
                ->searchable(),
            Column::make("Значение", "value")
                ->searchable(),
            Column::make("Лимит во времени (часы)", "time_limit_hour")
                ->searchable(),

        ];
    }
}
