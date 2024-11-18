<?php

namespace app\libraries;

class Model extends Database
{
    public static string $NAMESPACE = "app\\models\\";
    protected string $table = '';
    protected string $primary_key = 'id';

    public function create(array $param): int
    {
        $keys = implode(',', array_keys($param));
        $values = "'" . implode("','", array_values($param)) . "'";

        return $this->query("INSERT INTO $this->table ($keys) VALUES ($values)")->execute()->rowCount();
    }

    public function update(array $param, int $id): int
    {
        $sql = "UPDATE $this->table SET";
        $comma = " ";

        foreach ($param as $key => $val) {
            $sql .= $comma . $key . " = '" . trim($val) . "'";
            $comma = ", ";
        }

        $sql .= " WHERE $this->primary_key = $id";

        return $this->query($sql)->execute()->rowCount();
    }

    public function all(): false|array
    {
        return $this->query("SELECT * FROM `$this->table`")->execute()->get();
    }

    public function count() {
        return $this->query("SELECT COUNT(`id`) as count FROM `$this->table`")->execute()->fetch()->count;
    }

    public function limit(int $limit) {
        return $this->query("SELECT * FROM `$this->table` ORDER BY `id` DESC LIMIT $limit")->execute()->get();
    }

    public function find(int $id): mixed
    {
        return $this->query("SELECT * FROM `$this->table` WHERE `$this->primary_key` = :id")->execute(['id' => $id])->fetch();
    }

    public function where(string $column, mixed $value): static|null
    {
        return $this->query("SELECT * FROM `$this->table` WHERE `$column` = :value")->execute(['value' => $value]);
    }

    public function destroy(int $id): int
    {
        return $this->query("DELETE FROM `$this->table` WHERE `$this->primary_key` = :id")->execute(['id' => $id])->rowCount();
    }
}