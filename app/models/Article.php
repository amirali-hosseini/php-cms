<?php

namespace app\models;

use app\libraries\Model;

class Article extends Model
{
    protected string $table = 'articles';
    public static string $DIR = 'blog';

    public function join(): false|array
    {
        return $this
            ->query("SELECT `$this->table`.*,users.name as user_name,categories.name as category_name FROM `$this->table` INNER JOIN `categories` ON `$this->table`.category_id = `categories`.id INNER JOIN `users` ON `$this->table`.user_id = `users`.id")
            ->execute()
            ->get();
    }
}