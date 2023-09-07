<?php

namespace Framework\Http\Response;

class Response
{
    public static function createObj(): static
    {
        return new static();
    }

    public static function view(string $file): string
    {
        $data = file_get_contents($_ENV['BASE_PATH'] . $file);

        return !$data ? self::notFound() : $data;
    }

    public static function json(array $data = [], int $code = 200): string
    {
        header('Content-type: application/json; charset=utf-8', true, $code);

        return json_encode($data);
    }

    public static function notFound(): string
    {
        return file_get_contents(__DIR__ . '/views/404.blade.php');
    }

    public static function notFoundJson(): string
    {
        return self::json([
            'message' => 'Not found.'
        ], 404);
    }
}