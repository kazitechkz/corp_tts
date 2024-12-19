<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use App\Traits\Upload;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Ticket
 *
 * @property int $id
 * @property int $category_id
 * @property int $user_id
 * @property string $title
 * @property string $description
 * @property string|null $file_url
 * @property bool $is_answered
 * @property bool $is_resolved
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Idea $idea
 * @property User $user
 * @property Collection|TicketMessage[] $ticket_messages
 *
 * @package App\Models
 */
class Ticket extends Model
{
    use Upload;

    protected $table = 'tickets';

    protected $casts = [
        'category_id' => 'int',
        'user_id' => 'int',
        'executor_id' => 'int',
        'deadline_id' => 'int',
        'status_id' => 'int',
        'is_answered' => 'bool',
        'is_resolved' => 'bool',
        'deadline_date' => 'datetime',
        'reopen_at' => 'datetime',
        'is_reopen' => 'bool'
    ];

    protected $fillable = [
        'category_id',
        'user_id',
        'title',
        'description',
        'file_url',
        'executor_id',
        'deadline_id',
        'status_id',
        'deadline_date',
        'reopen_at',
        'is_reopen',
        'is_answered',
        'is_resolved',
        'category_value'
    ];

    // Отношение с категорией тикетов
    public function category()
    {
        return $this->belongsTo(TicketCategory::class, 'category_id');
    }

    // Отношение с пользователем
    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }

    // Отношение с исполнителем тикета
    public function executor()
    {
        return $this->belongsTo(User::class, 'executor_id');
    }

    // Отношение с дедлайнами
    public function deadline()
    {
        return $this->belongsTo(TicketDeadline::class, 'deadline_id');
    }

    // Отношение со статусом тикета
    public function status()
    {
        return $this->belongsTo(TicketStatus::class, 'status_id');
    }

    // Сообщения тикета
    public function ticket_messages()
    {
        return $this->hasMany(TicketMessage::class);
    }

    // Проверка, является ли тикет просроченным
    public function isOverdue()
    {
        return $this->deadline_date && $this->deadline_date->isPast();
    }

    // Проверка, является ли тикет повторно открытым
    public function isReopened()
    {
        return $this->is_reopen;
    }
}
