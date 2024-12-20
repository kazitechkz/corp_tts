<?php

namespace App\Exports;

use App\Models\Ticket;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithMapping;
use PhpOffice\PhpSpreadsheet\Shared\Date;

class TicketExport implements FromCollection, WithMapping, WithHeadings, WithColumnWidths
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public $items;

    public function __construct($items)
    {
        $this->items = $items;
    }

    public function collection()
    {
        return Ticket::whereIn('id', $this->items)->get();
    }

    public function headings(): array
    {
        return [
            '#',
            'Категория',
            'Пользователь',
            'Тема',
            'Описание',
            'Дан ли ответ на вопрос',
            'Решен ли вопрос',
            'Дата создания',
            'Дата обновления',
            'Исполнитель',
            'Дедлайн',
            'Статус',
            'Значение категории',
            'Переоткрыт ли пользователем',
            'Взят вовремя',
            'Рейтинг',
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 10,
            'B' => 40,
            'C' => 40,
            'D' => 30,
            'E' => 100,
            'F' => 20,
            'G' => 20,
            'H' => 20,
            'I' => 20,
            'J' => 30,
            'K' => 20,
            'L' => 20,
            'M' => 40,
            'N' => 20,
            'O' => 20,
            'P' => 20,
        ];
    }

    public function map($tickets): array
    {
        return [
            $tickets->id,
            $tickets->category->title ?? 'Не указана',
            $tickets->user->name . " (" . $tickets->user->email . ")",
            $tickets->title,
            htmlspecialchars($tickets->description ?? 'Нет описания'),
            $tickets->is_answered ? "Отвечен" : "Не отвечен",
            $tickets->is_resolved ? "Решен" : "Не решен",
            $tickets->created_at->format("d.m.Y H:i"),
            $tickets->updated_at->format("d.m.Y H:i"),
            $tickets->executor->name ?? 'Не назначен',
            $tickets->deadline?->title ?? 'Не указан',
            $tickets->status?->title ?? 'Не указан',
            $tickets->category_value ?? 'Не указано',
            $tickets->reopened_by_user ? 'Да' : "Нет",
            $tickets->at_time ? 'Да' : "Нет",
            $tickets->rating ?? "-",
        ];
    }
}
