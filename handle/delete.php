<?php

require_once "../App.php";

if ($request->hasGet("id")) {
    $id = $request->get("id");

    $stm = $conn->prepare("SELECT * from todo where `id`=(:id)");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $isValid = $stm->execute();

    if ($isValid) {
        $stm = $conn->prepare("DELETE from todo where `id`=(:id)");
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $isDeleted = $stm->execute();

        if ($isDeleted) {
            $session->set("success", "data deleted successfully");
            $request->header("../index.php");
        }
    } else {
        $request->header("../index.php");
    }
} else {
    $request->header("../index.php");
}
