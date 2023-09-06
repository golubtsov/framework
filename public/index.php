<?php

require_once '../vendor/autoload.php';
require '../vendor/larapack/dd/src/helper.php';

use App\Models\Book;
use Symfony\Component\Dotenv\Dotenv;

$env = new Dotenv();
$env->load('../.env');

$books = (new Book())->user(1);

echo '<pre>';

dd($books);