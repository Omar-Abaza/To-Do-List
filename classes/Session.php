<?php
class Session
{
    public function __construct()
    {
        session_start();
    }
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }
    public function get(string $key)
    {
        return isset($_SESSION[$key]) ? $_SESSION[$key] : null;
    }
    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }
    public function destroy()
    {
        session_destroy();
    }
}
