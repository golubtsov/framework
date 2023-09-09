<?php

namespace src\framework\Http;

use src\framework\Routing\Router;

class Kernel
{
    public function handle(): void
    {
        $request = Request::createFromGlobals();

        Router::execute($request);
    }
}