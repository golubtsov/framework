<?php

use Framework\Routing\Router;
use Framework\Http\Controller\Controller;

Router::put('/blog/update/(\d+)', Controller::class, 'index');
