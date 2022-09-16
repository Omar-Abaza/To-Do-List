<?php

require_once "../App.php";

if ($request->hasPost("submit")) {
    $title = $request->clean("title");

    $validation->validate("title", $title, ["Required", "Str"]);
    $error = $validation->getError();

    if (empty($error)) {

        $stm = $conn->prepare("INSERT INTO todo(`title`) values(:title)");
        $stm->bindParam(":title", $title, PDO::PARAM_STR);
        $isInserted = $stm->execute();

        if ($isInserted) {
            $session->set("success", "data inserted successfully");
            $request->header("../index.php");
        }
    } else {
        $session->set("errors", $error);
        // echo '<pre><br />'; print_r($session->get("errors")); echo '</pre>';
        $request->header("../index.php");
    }
} else {
    $request->header("../index.php");
}
