<?php

namespace Framework\View;

use Jenssegers\Blade\Blade;

class View
{
    private static Blade $blade;

    public static function render(string $file, array $data = []): string
    {
        self::$blade = new Blade($_ENV['BASE_PATH'] . 'public/views/', 'cache');

        return self::$blade->make($file)->with($data)->render();
    }
}