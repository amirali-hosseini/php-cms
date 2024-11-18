<?php

namespace app\models;

use app\libraries\Model;

class User extends Model
{
    protected string $table = 'users';

    public static function info(string $key = '')
    {
        if (is_logged_in()) {

            $user_id = $_SESSION['user_id'];

            $info = (new User)->find($user_id);

            if (!empty($key))
                return $info->$key;
            else
                return $info;

        } else {
            return [];
        }
    }
}