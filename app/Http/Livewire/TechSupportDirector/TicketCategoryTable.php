<?php

namespace App\Http\Livewire\TechSupportDirector;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\TicketCategory;

class TicketCategoryTable extends DataTableComponent
{
    protected $model = TicketCategory::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([20,50,100]);
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('cto-ticket-category.edit', $row);
            });
        $this->setBulkActions([
            'deleteSelected' => 'Удалить'
        ]);
    }

    public function deleteSelected(): void
    {
        $items = $this->getSelected();
        foreach ($items as $key => $value) {
            $model = TicketCategory::find($value);
            if ($model and !in_array($value, [1,2,3,4,5,6,7,8])) {
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
        ];
    }
}
