<?php


require_once "../App.php";

if ($request->hasGet("id") && $request->hasGet("name")) {

    $id = $request->get("id");
    $status = $request->get("name");

    $stm = $conn->prepare("SELECT * from todo where `id`=(:id)");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $isValid = $stm->execute();

    if ($isValid) {
        $stm = $conn->prepare("UPDATE todo set `status`=(:status) where `id`=(:id)");
        $stm->bindParam(":status", $status, PDO::PARAM_STR);
        $stm->bindParam(":id", $id, PDO::PARAM_INT);
        $isUpdated = $isValid = $stm->execute();

        if ($isUpdated) {
            $request->header("../index.php");
        }
    }
} else {
    $request->header("../index.php");
}
