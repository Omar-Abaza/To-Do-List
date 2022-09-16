<?php
require_once "Validator.php";
class Required implements Validator
{
    public function check($key, $value)
    {
        return empty($value) ? "$key is required" : false;
    }
}
