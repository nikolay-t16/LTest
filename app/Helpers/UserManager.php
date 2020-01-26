<?php

namespace App\Helpers;

use App\Mappers\User;
use phpDocumentor\Reflection\Types\Integer;

/**
 * Class UserManager
 * @package App\Helpers
 */
class UserManager
{
    /**
     * @var int
     */
    protected static $defaultUserId = 1;
    /**
     * @var User|null
     */
    protected static $user = null;

    /**
     * @return User|null
     */
    public static function getUser(): User
    {
        if (self::$user !== null) {
            return self::$user;
        }

        $id = self::getUserId();

        return User::find($id);
    }

    /**
     * @return int
     */
    public static function getUserId(): int
    {
        return request()->get('user', self::$defaultUserId);
    }
}
