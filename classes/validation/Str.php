<?php
require_once "Validator.php";
class Str implements Validator
{
    public function check($key, $value)
    {
        return is_numeric($value) ? "$key must be string" : false;
    }
}
