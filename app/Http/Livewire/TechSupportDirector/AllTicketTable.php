<?php

namespace App\Http\Livewire\TechSupportDirector;

use App\Exports\TicketExport;
use App\Models\TicketCategory;
use App\Models\TicketDeadline;
use App\Models\TicketStatus;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ticket;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\DateFilter;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class AllTicketTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([20, 50, 100]);
        $this->setPrimaryKey('id')
            ->setTableRowUrl(function($row) {
                return route('cto-ticket', $row);
            });
    }


    public function bulkActions(): array

    {
        return [
            'export' => 'Экспорт в excel',
        ];
    }

    public function export()

    {
        $tickets = $this->getSelected();
        $this->clearSelected();
        return Excel::download(new TicketExport($tickets), 'tickets.xlsx');

    }

    public function filters(): array

    {
        return [
            SelectFilter::make('Переоткрытый')
                ->options([
                    ''=> 'Все',
                    true => 'Да',
                    false => 'Нет',
                ])->filter(function($builder, string $value) {
                    return $builder->where(["is_reopen"=>$value]);
                }),
            SelectFilter::make('Отвечен ли?')
                ->options([
                    ''=> 'Все',
                    true => 'Да',
                    false => 'Нет',
                ])->filter(function($builder, string $value) {
                    return $builder->where(["is_answered"=>$value]);
                }),
            SelectFilter::make('Решен ли?')
                ->options([
                    ''=> 'Все',
                    true => 'Да',
                    false => 'Нет',
                ])->filter(function($builder, string $value) {
                    return $builder->where(["is_resolved"=>$value]);
                }),
            SelectFilter::make('Успел ли?')
                ->options([
                    ''=> 'Все',
                    true => 'Да',
                    false => 'Нет',
                ])->filter(function($builder, string $value) {
                    return $builder->where(["at_time"=>$value]);
                }),
            SelectFilter::make('Рейтинг')
                ->options([
                    ''=> 'Все',
                    1 => '1',
                    2 => '2',
                    3 => '3',
                    4 => '4',
                    5 => '5',
                ])->filter(function($builder, string $value) {
                    return $builder->where(["rating"=>$value]);
                }),
            SelectFilter::make('Категория')
                ->options(TicketCategory::pluck('title', 'id')->toArray())
                ->filter(function($builder, string $value) {
                    return $builder->where(["category_id"=>$value]);
                }),
            SelectFilter::make('Статус')
                ->options(TicketStatus::pluck('title', 'id')->toArray())
                ->filter(function($builder, string $value) {
                    return $builder->where(["status_id"=>$value]);
                }),
            SelectFilter::make('Исполнитель')
                ->options(User::where("role_id",5)->pluck('name', 'id')->toArray())
                ->filter(function($builder, string $value) {
                    return $builder->where(["executor_id"=>$value]);
                }),
            SelectFilter::make('Срок действия')
                ->options(TicketDeadline::pluck('title', 'id')->toArray())
                ->filter(function($builder, string $value) {
                    return $builder->where(["deadline_id"=>$value]);
                }),
            DateFilter::make('C')
                ->filter(function ($builder, $value) {
                    $builder->whereDate('tickets.created_at', '>=', $value);
                }),

            DateFilter::make('До')
                ->filter(function ($builder, $value) {
                    $builder->whereDate('tickets.created_at', '<=', $value);
                }),
        ];
    }

    public function columns(): array
    {
        return [
            Column::make("Идентификатор", "id")
                ->sortable(),
            Column::make("Категория", "category.title")
                ->sortable(),
            Column::make("Заявитель", "user.name")
                ->sortable(),
            Column::make("Тема", "title")
                ->searchable(),
            Column::make("Срок исполнение", "deadline.title")
                ->sortable(),
            Column::make("Статус", "status.title")
                ->sortable(),
            Column::make("Дата до", "deadline_date")
                ->sortable(),
            BooleanColumn::make("Открыт", "is_reopen")
                ->sortable(),
            BooleanColumn::make("Отвечен", "is_answered")
                ->sortable(),
            BooleanColumn::make("Решен", "is_resolved")
                ->sortable(),
            BooleanColumn::make("Открыт заявителем", "reopened_by_user")
                ->sortable(),
            Column::make("Рейтинг", "rating")
                ->sortable(),
            BooleanColumn::make("Во время", "at_time")
                ->sortable(),
            Column::make("Создан", "created_at")
                ->sortable(),
            Column::make("Обновлен", "updated_at")
                ->sortable(),
        ];
    }
}
