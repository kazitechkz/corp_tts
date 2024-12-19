<?php

namespace App\Http\Livewire\Employee\Notification;

use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Notification;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class NotificationTable extends DataTableComponent
{
    protected $model = Notification::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([20,50,100]);
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('employee-notification-show', ["id"=>$row]);
            });
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {

        return Notification::query()->where(["user_id" =>auth()->id()]);
    }

    public function filters(): array

    {
        return [
            SelectFilter::make('Просмотрен ли')
                ->options([
                    ''=> 'Все',
                    true => 'Просмотрен',
                    false => 'Не просмотрен',
                ])->filter(function($builder, string $value) {
                    return $builder->where(["seen"=>$value]);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Id", "id")
                ->searchable(),
            Column::make("Тема", "topic")
                ->searchable(),
            BooleanColumn::make("Прочитано", "seen")
                ->sortable(),
            Column::make("Создан", "created_at")
                ->sortable(),
            Column::make("Обновлен", "updated_at")
                ->sortable(),
        ];
    }
}
