<?php

namespace Core\Exception;

use Core\View\View;

class ExceptionHandler {

    public static function render(string $title, string $description)
    {
        $view = View::render('error', ['title' => $title, 'description' => $description]);
        exit;
        return $view;
    }

}