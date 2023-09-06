<?php

require_once '../vendor/autoload.php';
require '../vendor/larapack/dd/src/helper.php';

use Framework\Http\Request;
use Symfony\Component\Dotenv\Dotenv;

$env = new Dotenv();
$env->load('../.env');

$request = Request::createFromGlobals();