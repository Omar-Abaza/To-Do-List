<?php

class Request
{
    public function get(string $key = null)
    {
        return ($key == null) ?  $_GET : ((isset($_GET[$key])) ? $_GET[$key] : null);
    }

    public function post(string $key = null)
    {
        return ($key == null) ?  $_POST : ((isset($_POST[$key])) ? $_POST[$key] : null);
    }

    public function hasPost($key)
    {
        return isset($_POST[$key]);
    }
    public function hasGet($key)
    {
        return isset($_GET[$key]);
    }

    public function clean($key)
    {
        return trim(htmlspecialchars($_POST[$key]));
    }
    public function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }
    public function header($file)
    {
        return header("location: $file");
    }
}
