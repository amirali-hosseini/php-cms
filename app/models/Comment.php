<?php

namespace app\models;

use app\libraries\Model;

class Comment extends Model
{
    protected string $table = 'comments';

    public function join(bool $status = null): false|array
    {
        $status_query = is_null($status) ? ' ' : " WHERE `comments`.is_approved = $status ";

        return $this
            ->query("SELECT `$this->table`.*,articles.title as article_title FROM `$this->table` INNER JOIN `articles` ON `$this->table`.article_id = `articles`.id " . $status_query)
            ->execute()
            ->get();
    }
}