<?php

namespace App\Http\Livewire\TechSupportEmployee;

use App\Models\TicketCategory;
use App\Models\TicketDeadline;
use App\Models\TicketExecutor;
use App\Models\TicketStatus;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;
use App\Models\Ticket;
use Rappasoft\LaravelLivewireTables\Views\Columns\BooleanColumn;
use Rappasoft\LaravelLivewireTables\Views\Columns\LinkColumn;
use Rappasoft\LaravelLivewireTables\Views\Filters\SelectFilter;

class TicketTable extends DataTableComponent
{
    protected $model = Ticket::class;

    public function configure(): void
    {
        $this->setPrimaryKey('id');
        $this->setPerPageAccepted([20, 50, 100]);
    }

    public function builder(): \Illuminate\Database\Eloquent\Builder
    {

        $my_categories = TicketExecutor::where(["executor_id" => auth()->id()])
            ->pluck("category_id")->toArray();
        return Ticket::query()->whereIn("category_id", $my_categories)->where(["executor_id" => null]);
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
            SelectFilter::make('Категория')
                ->options(TicketCategory::pluck('title', 'id')->toArray())
                ->filter(function($builder, string $value) {
                    return $builder->where(["category_id"=>$value]);
                }),
            SelectFilter::make('Срок действия')
                ->options(TicketDeadline::pluck('title', 'id')->toArray())
                ->filter(function($builder, string $value) {
                    return $builder->where(["deadline_id"=>$value]);
                }),
        ];
    }


    public function columns(): array
    {
        return [
            Column::make("ID", "id")
                ->searchable(),
            Column::make("Категория", "category.title")
                ->searchable(),
            Column::make("Пользователь", "user.name")
                ->searchable(),
            Column::make("Тема", "title")
                ->searchable(),
            Column::make("Срочность", "deadline.title")
                ->sortable(),
            Column::make("Статус", "status.title")
                ->sortable(),
            Column::make("Крайний срок выполнения задачи", "deadline_date")
                ->sortable(),
            BooleanColumn::make("Вопрос переоткрыт", "is_reopen")
                ->sortable(),
            BooleanColumn::make("Отвечен ли", "is_answered")
                ->sortable(),
            BooleanColumn::make("Решен ли", "is_resolved")
                ->sortable(),
            LinkColumn::make('Действия')
                ->title(fn($row) => 'Забрать')
                ->location(fn($row) => route('tech-support-employee-ticket-take',$row))
                ->attributes(function($row) {
                    return [
                        'class' => 'bg-blue-500 text-white px-4 py-2 rounded',
                    ];
                }),
        ];
    }
}
