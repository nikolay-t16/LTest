<?php

namespace App\Mappers;

use EloquentTypeHinting;
use Illuminate\Database\Eloquent\Model;

/**
 * Class User
 * @package App\Mappers
 * @mixin EloquentTypeHinting
 * @property int user_id
 * @property string login
 * @property boolean is_admin
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
}
