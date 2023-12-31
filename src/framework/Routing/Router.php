<?php

namespace src\framework\Routing;

use src\framework\Http\Request;
use src\framework\Http\Response\Response;
use src\framework\Routing\Enum\RouterMethodsEnum;

class Router
{
    private static array $ROUTES = [
        'GET' => [],
        'POST' => [],
        'PUT' => [],
        'DELETE' => [],
    ];

    public static function get(string $url, string $controller, string $method): void
    {
        self::$ROUTES[RouterMethodsEnum::GET][$url] = [$controller, $method];
    }

    public static function post(string $url, string $controller, string $method): void
    {
        self::$ROUTES[RouterMethodsEnum::POST][$url] = [$controller, $method];
    }

    public static function put(string $url, string $controller, string $method): void
    {
        self::$ROUTES[RouterMethodsEnum::PUT][$url] = [$controller, $method];
    }

    public static function delete(string $url, string $controller, string $method): void
    {
        self::$ROUTES[RouterMethodsEnum::DELETE][$url] = [$controller, $method];
    }

    public static function execute(Request $request): void
    {
        $routes = self::$ROUTES[$request->getMethod()];

        foreach ($routes as $route => $handler) {

            $pattern = '/^' . str_replace('/', '\/', $route) . '$/';

            if (preg_match($pattern, $request->getUrl())) {
                echo (new $handler[0]())->{$handler[1]}($request);
                return;
            }
        }

        $request->isJson() ? Response::notFoundJson() : Response::notFound();
        exit();
    }
}