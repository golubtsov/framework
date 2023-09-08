<?php

namespace Framework\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;
use Jenssegers\Blade\Blade;

class View
{
    private static Blade $blade;

    public static function render(string $file, array $data = []): string
    {
        self::$blade = new Blade($_ENV['BASE_PATH'] . 'resources/views/', 'cache');

        return self::$blade->make($file)->with($data)->render();

        //TODO use for TWIG
//        $loader = new FilesystemLoader($_ENV['BASE_PATH'] . 'resources/views');
//        $twig = new Environment($loader);
//        return $twig->render($file, $data);
    }
}