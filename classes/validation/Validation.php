<?php
require_once "Validator.php";
class Validation
{
    private $errors = [];
    public function validate($key, $value, array $rules)
    {
        foreach ($rules as $rule) {
            $obj = new $rule;   // $rule=>(Required , Str)
            $error = $obj->check($key, $value); 

            if ($error != false) {
                $this->errors[] = $error;
            }
        }
    }
    public function getError()
    {
        return $this->errors;
    }
}
