<?php

namespace Framework\Http\Response;

use JetBrains\PhpStorm\NoReturn;

class Response
{
    //TODO change path for $file
    public static function view(string $file): void
    {
        $data = file_get_contents($_ENV['BASE_PATH'] . 'public/views/' . $file);

        if (!$data) {
            self::notFound();
        } else {
            echo $data;
        }
    }

    public static function json(array $data = [], int $code = 200): bool|string
    {
        header('Content-type: application/json; charset=utf-8', true, $code);

        return json_encode($data);
    }

    public static function notFound(): bool|string
    {
        return file_get_contents(__DIR__ . '/views/404.blade.php');
    }

    public static function notFoundJson(): void
    {
        self::json([
            'message' => 'Not found.'
        ], 404);
    }

    #[NoReturn] public static function redirect(string $url): void
    {
        header('Location: ' . $url);
        die();
    }
}