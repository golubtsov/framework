<?php

namespace Framework\View;

use Twig\Environment;
use Twig\Loader\FilesystemLoader;

class View
{
    public static function render(string $file, array $data = []): string
    {
        $loader = new FilesystemLoader($_ENV['BASE_PATH'] . 'resources/views');
        $twig = new Environment($loader);

        return $twig->render($file, $data);
    }
}