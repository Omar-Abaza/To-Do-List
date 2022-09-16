<?php

require_once "../App.php";

if ($request->hasPost("submit")) {
    if ($request->hasGet("id")) {
        $id = $request->get("id");
        $title = $request->clean("title");

        $validation->validate("title", $title, ["Required", "Str"]);
        $error = $validation->getError();

        if (empty($error)) {

            $stm = $conn->prepare("SELECT * from todo where `id`=(:id)");
            $stm->bindParam(":id", $id, PDO::PARAM_INT);
            $isValid = $stm->execute();

            if ($isValid) {
                $stm = $conn->prepare("UPDATE todo set `title`=(:title) where `id`=(:id)");
                $stm->bindParam(":title", $title, PDO::PARAM_STR);
                $stm->bindParam(":id", $id, PDO::PARAM_INT);
                $isUpdated = $isValid = $stm->execute();

                if ($isUpdated) {
                    $session->set("success", "data updated successfully");
                    $request->header("../index.php");
                } else {
                    $request->header("../index.php");
                }
            } else {
                $request->header("../index.php");
            }
        } else {
            $session->set("errors", $error);
            $request->header("../index.php");
        }
    } else {
        $request->header("../index.php");
    }
} else {
    $request->header("../index.php");
}
