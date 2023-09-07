<?php

namespace Framework\Http;

use Framework\Routing\Router;

class Kernel
{
    public function handle(Request $request): void
    {
        Router::execute($request);
    }
}