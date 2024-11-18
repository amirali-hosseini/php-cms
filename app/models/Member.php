<?php

namespace app\models;

use app\libraries\Model;

class Member extends Model
{
    protected string $table = 'members';
    public static string $DIR = 'team';
}