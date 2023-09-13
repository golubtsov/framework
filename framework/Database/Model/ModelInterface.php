<?php

namespace Framework\Database\Model;

use stdClass;

interface ModelInterface
{
    public function all(): array;
    public function find(int $id): stdClass|null;
    public function where(string $filed, string|int $value, ?string $operator = '='): static;
    public function whereOr(string $filed, string|int $value, ?string $operator = '='): static;
    public function get(): array;
}