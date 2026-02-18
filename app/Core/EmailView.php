<?php

class EmailView
{
    public static function render($view, $data = [])
    {
        $path = __DIR__ . "/../views/emails/{$view}.php";

        if (!file_exists($path)) {
            throw new Exception("Email template not found: {$view}");
        }

        extract($data);
        ob_start();
        require __DIR__ . "/../views/emails/{$view}.php";
        return ob_get_clean();
    }
}
