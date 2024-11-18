<?php

namespace app\models;

use app\libraries\Model;

class Portfolio extends Model
{
    public static string $DIR = 'portfolio';

    protected string $table = 'portfolios';
}