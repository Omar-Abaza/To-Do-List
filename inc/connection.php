<?php


try {
    
    $conn = new PDO("mysql:host=localhost;post=3306;dbname=todolist", "root", "");

} catch (Exception $e) {
    echo "connection failed".$e->getMessage();
}
