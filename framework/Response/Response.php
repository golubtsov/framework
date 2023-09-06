<?php

namespace Framework\Response;

class Response
{
    public function __construct()
    {
    }

    public function view(string $file): string
    {
        $data = file_get_contents($_ENV['BASE_PATH'] . $file);

        return !$data ? file_get_contents(__DIR__ . '/views/404.blade.php') : $data;
    }

    public function json(array $data = [], int $code = 200): string
    {
        header('Content-type: application/json; charset=utf-8', true, $code);

        return json_encode($data);
    }
}