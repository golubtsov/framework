<?php

namespace App\Models;

use Framework\Databse\Model\Model;
use stdClass;

class Book extends Model
{
    protected string $table = 'books';

    public function user(int $id): stdClass|null
    {
        return $this->belongsTo('users', $id);
    }

    public function comments(int $id): array
    {
        return $this->hasMany('comments', 'book_id', $id);
    }
}