<?php

namespace src\framework\Http\Response;

class Response
{
    public static function createObj(): static
    {
        return new static();
    }

    //TODO change path for $file
    public static function view(string $file): void
    {
        $data = file_get_contents($_ENV['BASE_PATH'] . 'resources/views/' . $file);

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
}