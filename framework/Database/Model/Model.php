<?php

namespace Framework\Databse\Model;

use PDO;
use stdClass;

abstract class Model implements ModelInterface
{
    protected PDO $pdo;

    protected string $table = 'example';

    private string $query = '';

    public function __construct()
    {
        $this->pdo = new PDO($_ENV['DB_CONNECTION'] . ':' . 'host=' . $_ENV['DB_HOST'] . ';' . 'dbname=' . $_ENV['DB_DATABASE'], $_ENV['DB_USERNAME'], $_ENV['DB_PASSWORD']);
    }

    public static function createModel(): static
    {
        return new static();
    }

    private function select(): string
    {
        return "SELECT * FROM $this->table";
    }

    public function all(): array
    {
        /** @var array $res */

        $response = $this->pdo->query("{$this->select()};")->fetchAll();

        if (count($response) == 0) {
            return [];
        }

        foreach ($response as $item) {
            $res[] = json_decode(json_encode($item), false);
        }

        return $res;
    }

    public function find(int $id): stdClass|null
    {
        $obj = $this->pdo->query("{$this->select()} WHERE id = $id;")->fetchObject();

        return $obj == null ? null : $obj;
    }

    public function where(string $filed, string|int $value, ?string $operator = '='): static
    {
        $this->query == '' ? $this->query .= "WHERE $filed $operator " : $this->query .= " AND $filed $operator ";

        $this->query .= is_int($value) ? $value : "\"$value\"";

        return $this;
    }

    public function whereOr(string $filed, string|int $value, ?string $operator = '='): static
    {
        $this->query == '' ? $this->query .= "WHERE $filed $operator " : $this->query .= " OR $filed $operator ";

        $this->query .= is_int($value) ? $value : "\"$value\"";

        return $this;
    }

    public function get(): array
    {
        /** @var array $res */

        $obj = $this->pdo->query("{$this->select()} $this->query;")->fetchAll();

        if ($obj == null) {
            return [];
        } else {
            foreach ($this->pdo->query("{$this->select()} $this->query;")->fetchAll() as $item) {
                $res[] = json_decode(json_encode($item), false);
            }
        }

        return $res;
    }

    private function changeTableName(string $table): static
    {
        $this->table = $table;

        return $this;
    }

    public function belongsTo(string $related, string|int $value): stdClass|null
    {
        $this->changeTableName($related)
            ->where('id', $value);

        return $this->pdo->query("{$this->select()} {$this->query};")->fetchObject();
    }

    public function hasMany(string $related, string $field, string|int $value): array
    {
        return $this->changeTableName($related)->where($field, $value)->get();
    }
}