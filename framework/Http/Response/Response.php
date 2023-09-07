<?php

namespace Framework\Http\Response;

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

    public static function json(array $data = [], int $code = 200): void
    {
        header('Content-type: application/json; charset=utf-8', true, $code);

        echo json_encode($data);
    }

    public static function notFound(): void
    {
        echo file_get_contents(__DIR__ . '/views/404.blade.php');
    }

    public static function notFoundJson(): void
    {
        self::json([
            'message' => 'Not found.'
        ], 404);
    }
}