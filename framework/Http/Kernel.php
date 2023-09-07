<?php

namespace Framework\Http;

use Framework\Routing\Router;

class Kernel
{
    public function handle(): void
    {
        $request = Request::createFromGlobals();

        Router::execute($request);
    }
}