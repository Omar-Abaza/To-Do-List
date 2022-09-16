<?php

require_once "inc/connection.php";
require_once "classes/Request.php";
require_once "classes/Session.php";
require_once "classes/validation/Required.php";
require_once "classes/validation/Str.php";
require_once "classes/validation/Validation.php";

$request = new Request;
$session = new Session;

$validation = new Validation;
