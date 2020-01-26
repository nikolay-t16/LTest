<?php


namespace App\Mappers;


use EloquentTypeHinting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * Class Ticket
 * @package App\Mappers
 * @mixin EloquentTypeHinting
 * @property int ticket_id
 * @property int user_id
 * @property string name
 * @property boolean open
 * @property HasOne user
 */
class TicketMsg extends Model
{
    const TABLE_NAME = 'ticket_msg';
    const FIELD_ID = 'ticket_msg_id';
    const FIELD_USER_ID = 'user_id';
    const FIELD_TICKET_ID = 'ticket_id';
    const FIELD_TEXT = 'text';
    /**
     * @var string
     */
    protected $table = self::TABLE_NAME;
    /**
     * @var string
     */
    protected $primaryKey = self::FIELD_ID;
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @return HasOne
     */
    public function user()
    {
        return $this->hasOne('App\Mappers\User', self::FIELD_USER_ID, User::FIELD_ID);
    }
}
