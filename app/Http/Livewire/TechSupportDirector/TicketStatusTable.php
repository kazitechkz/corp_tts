<?php

namespace App\Http\Livewire\TechSupportDirector;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TicketStatus;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;

class TicketStatusTable extends DataTableComponent
{
    protected $model = TicketStatus::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([20,50,100]);
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('cto-ticket-status.edit', $row);
            });
        $this->setBulkActions([
            'deleteSelected' => 'Удалить'
        ]);
    }

    public function deleteSelected(): void
    {
        $items = $this->getSelected();
        foreach ($items as $key => $value) {
            $model = TicketStatus::find($value);
            if ($model and !in_array($value, [1,2,3,4])) {
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
            BooleanColumn::make("Первый", "is_first")
                ->sortable(),
            BooleanColumn::make("Последний", "is_last")
                ->sortable(),
            Column::make("Предыдущий этап", "prev_id")
                ->sortable(),
            Column::make("Следующий этап", "next_id")
                ->sortable(),
        ];
    }
}
