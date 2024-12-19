<?php

namespace App\Models;

use App\Traits\Upload;
use Illuminate\Database\Eloquent\Model;

/**
 * @property integer $id
 * @property string $topic
 * @property string $message
 * @property boolean $seen
 * @property string $created_at
 * @property string $updated_at
 */
class Notification extends Model
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
    protected $fillable = ['topic', 'message', 'seen',"user_id", 'created_at', 'updated_at'];

    public function user()
    {
        return $this->belongsTo(User::class,"user_id");
    }
}
