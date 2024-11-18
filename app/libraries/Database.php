<?php

namespace app\libraries;

class Database
{

    private string $db_host = 'localhost';
    private int $db_port = 3306;
    private string $db_name = 'afra';
    private string $db_user = 'root';
    private string $db_pass = '123456';

    protected \PDO $db;
    protected \PDOStatement $stmt;
    protected string $error;

    public function __construct()
    {

        $dsn = "mysql:host=$this->db_host;dbname=$this->db_name;port=$this->db_port;charset=utf8";

        try {

            $this->db = new \PDO($dsn, $this->db_user, $this->db_pass);
            $this->db->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_OBJ);

        } catch (\PDOException $e) {

            $this->error = $e->getMessage();
            throw new \PDOException($this->error);

        }

    }

    public function query(string $sql): static
    {

        $this->stmt = $this->db->prepare($sql);
        return $this;

    }

    public function execute(array $params = []): static|null
    {

        return $this->stmt->execute($params) ? $this : null;

    }

    public function get(int $fetch_type = \PDO::FETCH_OBJ): false|array
    {

        return $this->stmt->fetchAll($fetch_type);

    }

    public function fetch(int $fetch_type = \PDO::FETCH_OBJ): mixed
    {

        return $this->stmt->fetch($fetch_type);

    }

    public function rowCount(): int
    {

        return $this->stmt->rowCount();

    }
}