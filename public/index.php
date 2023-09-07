<?php

require_once '../vendor/autoload.php';
require_once '../vendor/larapack/dd/src/helper.php';
require_once '../routes/web.php';

use Framework\Http\Request;
use Framework\Http\Kernel;
use Symfony\Component\Dotenv\Dotenv;

$env = new Dotenv();
$env->load('../.env');

$request = Request::createFromGlobals();

$kernel = new Kernel();
$kernel->handle($request);

