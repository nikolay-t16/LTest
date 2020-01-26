<?php

namespace App\Mappers;

use EloquentTypeHinting;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Mappers\Ticket;

/**
 * Class User
 * @package App\Mappers
 * @mixin EloquentTypeHinting
 * @property int user_id
 * @property string login
 * @property boolean is_admin
 * @property HasMany tickets
 */
class User extends Model
{
    const TABLE_NAME = 'user';
    const FIELD_ID = 'user_id';
    const FIELD_LOGIN = 'login';
    const FIELD_IS_ADMIN = 'is_admin';

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
    public function tickets()
    {
        return $this->hasMany('App\Mappers\Ticket', self::FIELD_ID, Ticket::FIELD_USER_ID);
    }
}
