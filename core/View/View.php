<?php

namespace Core\View;

class View
{
    public static function render(string $view, array $data = [])
    {
        $view = __DIR__ . "\\viewPages\\" . $view . ".php";
        if (true == file_exists($view)) {
            extract($data);
            include_once $view;
        } else {
            $viewPageError = __DIR__ . "\\" . "viewPages\\error.php";
            $data = ['title' => 'view not found', 'description' => 'Your view selected is not found'];
            extract($data);
            include_once $viewPageError;
        }
    }
}