<?php
class ShowError
{
    public static function show404Page()
    {
        http_response_code(404);
        include (__DIR__ . '/../public/404.php');
        exit;
    }
}
