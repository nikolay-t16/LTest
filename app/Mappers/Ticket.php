<?php


namespace App\Mappers;


use EloquentTypeHinting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * Class Ticket
 * @package App\Mappers
 * @mixin EloquentTypeHinting
 * @property int ticket_id
 * @property int user_id
 * @property string name
 * @property boolean open
 * @property HasMany messages
 */
class Ticket extends Model
{
    const TABLE_NAME = 'ticket';
    const FIELD_ID = 'ticket_id';
    const FIELD_USER_ID = 'user_id';
    const FIELD_NAME = 'name';
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
     * @return HasMany
     */
    public function messages()
    {
        return $this->hasMany('App\Mappers\TicketMsg', self::FIELD_ID, TicketMsg::FIELD_TICKET_ID);
    }
}
