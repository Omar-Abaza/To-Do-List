<?php
require_once 'inc/header.php';
?>

<?php
require_once "App.php";
if ($request->hasGet("id")) {
    $id = $request->get("id");
    $stm = $conn->prepare(" SELECT * from todo where `id`=(:id)");
    $stm->bindParam(":id", $id, PDO::PARAM_INT);
    $isSelected = $stm->execute();
    if ($isSelected) {
        $card = $stm->fetch(PDO::FETCH_ASSOC);
    } else {
        $request->header("index.php");
    }
} else {
    $request->header("index.php");
}
?>


<body class="container w-50 mt-5">
    <form action="handle/update.php?id=<?= $id ?>" method="post">
        <textarea type="text" class="form-control" name="title" id="" placeholder="enter your note here"><?= $card["title"] ?></textarea>
        <div class="text-center">
            <button type="submit" name="submit" class="form-control text-white bg-info mt-3 ">Update</button>
        </div>
    </form>
</body>

</html>