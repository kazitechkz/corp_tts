<?php

namespace App\Models;

use App\Models\Ticket;
use App\Traits\Upload;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $title
 * @property string $value
 * @property int $time_limit_hour
 * @property string $created_at
 * @property string $updated_at
 * @property Ticket[] $tickets
 */
class TicketDeadline extends Model
{
    use Upload;
    /**
     * The "type" of the auto-incrementing ID.
     *
     * @var string
     */
    protected $keyType = 'integer';

    /**
     * @var array
     */
    protected $fillable = ['title', 'value', 'time_limit_hour',];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tickets()
    {
        return $this->hasMany(TicketDeadline::class, 'deadline_id');
    }
}
