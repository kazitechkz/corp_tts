<?php

namespace App\Models;

use App\Models\Ticket;
use App\Traits\Upload;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property integer $prev_id
 * @property integer $next_id
 * @property string $title
 * @property string $value
 * @property boolean $is_first
 * @property boolean $is_last
 * @property string $created_at
 * @property string $updated_at
 * @property TicketStatus $nextTicketStatus
 * @property TicketStatus $prevTicketStatus
 * @property Ticket[] $tickets
 */
class TicketStatus extends Model
{
    use Upload;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'ticket_status';

    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['prev_id', 'next_id', 'title', 'value', 'is_first', 'is_last', 'created_at', 'updated_at'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function nextTicketStatus()
    {
        return $this->belongsTo(TicketStatus::class, 'next_id',"id");
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function prevTicketStatus()
    {
        return $this->belongsTo(TicketStatus::class, 'prev_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(\App\Models\Ticket::class, 'status_id');
    }
}
